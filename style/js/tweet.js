(function tweetButton() {
  window.addEventListener('load', function() {
    var tweetElm = document.createElement('div');
    tweetElm.innerHTML = '<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://medianet.inf.uec.ac.jp/~y1510151/" data-text="" data-lang="ja">ツイート</a>';

    document.querySelector('.twitter').appendChild(tweetElm);

    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
  });
})();
