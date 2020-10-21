<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Rockstar PHP Developers</title>
        
        <meta name="description" content="Follow rockstar PHP developers with a single click">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Stint+Ultra+Condensed' rel='stylesheet' type='text/css'>
        <style>
            @media (min-width: 767px) {
                .container {
                    width: 768px;
                }
            }
            
            .jumbotron h1{
                font-size: 60px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Rockstar PHP Developers</h1>
                    <p class="lead">This is an opensource alternative to <a href="http://followphpdevs.com">followphpdevs.com</a>. One click
and you will follow all these awesome PHP people.</p>


                    <div class="text-center">
                        <?php if(!$success): ?>
                            <a href="/twitter/auth" class="center-text btn btn-primary btn-lg text-center"><i class="fa fa-twitter"></i> Follow all <?=count($devs)?></a>
                        <?php else:?>
                            <span class="text-success lead">All done! Processing will take about a minute.</span>
                        <br/>
                        (You can close the page now, but please do share it with friends)
                        <?php endif;?>
                        <br/><br/>
<a href="https://twitter.com/share" class="twitter-share-button" data-text="Follow <?=count($devs)?> awesome PHP developers with a single click" data-size="large" data-hashtags="PHP,webdev">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  <br/>                 
<small>Someone missing from the list? Feel free to suggest them <a href="https://github.com/dracony/phprockstars.com/blob/master/assets/config/devs.php">by sending a PR</a>.</small>
</div>
            </div>
            
            <div class="row">
                <?php 
		   $parts =  array(array(), array());
		foreach($devs as $key => $dev) {
			$parts[$key%2][]=$dev;
		}
//                    $parts = array_chunk($devs, count($devs)/2);
                ?>
                <?php foreach($parts as $part): ?>
                    <div class="col-sm-6 col-xs-12">
                        <?php foreach($part as $dev): ?>
                            <div class="media">
                                <div class="media-left media-middle">
                                    <a href="https://twitter.com/<?=$dev['twitter']?>">
                                        <img class="media-object" src="https://twitter-avatar.now.sh/<?=$dev['twitter']?>">
                                    </a>
                                </div>
                                <div class="media-body">

                                    <h4 class="media-heading"><a href="https://twitter.com/<?=$dev['twitter']?>"><?php $_($dev['name']); ?></a></h4>

                                    <?php $_($dev['desc']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <hr/>
            <div class="row">
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'phprockstars';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
            </div>
        </div>
        
        <hr/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </body>
</html>
