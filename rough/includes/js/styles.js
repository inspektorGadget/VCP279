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
/*
*because i was too lazy to rewrite this properly for use on child elements
*i am reproducing redundant code here
*sorry bout that
*/
Core.start(StripeOdd);

var StripeOddRental =
{
  init: function()
  {
    var stripeInside = Core.getElementsByClass("stripeInsideRental");
    for (var i = 0; i < stripeInside.length; i++) 
    {
      var stripeThese = stripeInside[i].getElementsByTagName("table");
      for ( var j = 1; j < stripeThese.length; j += 2)
      {
        Core.addClass(stripeThese[j], "tableStripe");
      }
    };
  }
};

Core.start(StripeOddRental);


