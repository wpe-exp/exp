module.exports = function(d, s, id, url) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&appId=504626236318429&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);

  if (!id) {
    return;
  }
  var pageURL = url ? url : location.href;
  pageURL = encodeURI(pageURL);
  url = 'http://api.b.st-hatena.com/entry.count?url=' + location.href;
  console.log(url);
  $.ajax({
    url: url,
    dataType: 'jsonp',
    success: function(json) {
      var count;
      count = json.count ? json.count : 0;
      document.getElementById('fb-count').innerHTML = count;
    }
  });
};
