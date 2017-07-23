(function likeButton() {
  var likeElm = document.createElement('div');
  likeElm.innerHTML = '<div class="fb-like" data-action="like" data-href="http://example.com/" data-layout="button_count" data-share="false" data-size="small"></div>';

  window.addEventListener('load', function() {
    document.querySelector('.facebook').appendChild(likeElm);

    window.fbAsyncInit = function() {
      FB.init({
        appId: 'XXXXXXXX',
        xfbml: true,
        version: 'v2.8'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.8&appId=XXXXXXXX";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  });
})();