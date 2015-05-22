<?php

namespace App\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter extends \PHPixie\Controller {

	public function action_index() {
		$view = $this->pixie->view('main');
        $view->devs = $this->pixie->config->get('devs');
        $view->success = $this->pixie->session->flash('success');
        $this->response->body = $view->render();
	}
    
	public function action_auth() {
		$api = $this->api();
        $callback = $this->pixie->router->get('default')->url(array('action' => 'callback'), true);
        $request_token = $api->oauth('oauth/request_token', array('oauth_callback' => $callback));
        
        $this->pixie->session->set('oauth_token', $request_token['oauth_token']);
        $this->pixie->session->set('oauth_token_secret', $request_token['oauth_token_secret']);
        
        $url = $api->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        return $this->redirect($url);
	}
    
	public function action_callback() {
		$api = $this->api();
        
        $request_token = [];
        $request_token['oauth_token'] = $this->pixie->session->get('oauth_token');
        $request_token['oauth_token_secret'] = $this->pixie->session->get('oauth_token_secret');

        if (isset($_REQUEST['oauth_token']) && $request_token['oauth_token'] !== $_REQUEST['oauth_token']) {
            return $this->redirect('/');
        }
        
        $api = $this->api($request_token['oauth_token'], $request_token['oauth_token_secret']);
        $access_token = $api->oauth("oauth/access_token", array("oauth_verifier" => $_REQUEST['oauth_verifier']));
        
        $this->pixie->session->flash('success', true);
        
        $file = $this->pixie->root_dir.'/follow.php';
        $command = sprintf(
            'php %s "%s" "%s" > /dev/null &',
            $file,
            $access_token['oauth_token'],
            $access_token['oauth_token_secret']
        );
        exec($command);
        
        return $this->redirect('/');
	}
    
    protected function api($token = null, $token_secret = null)
    {
        return new TwitterOAuth(
            $this->pixie->config->get('twitter.consumer_key'),
            $this->pixie->config->get('twitter.consumer_secret'),
            $token,
            $token_secret
        );
    }
}
