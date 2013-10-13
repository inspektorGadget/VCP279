var StripeOdd =
{
  init: function()
  {
    var stripeInside = Core.getElementsByClass("stripeInside");
    for (var i = 0; i < stripeInside.length; i++) 
    {
    	var stripeThese = stripeInside[i].getElementsByTagName("tr");
    	for ( var j = 1; j < stripeThese.length; j += 2)
    	{
    		Core.addClass(stripeThese[j], "tableStripe");
    	}
    };
  }
};

Core.start(StripeOdd);


