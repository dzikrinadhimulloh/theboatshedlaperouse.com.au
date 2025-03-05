import $ from 'jquery'
import HelloWorld from '@/hello-world'

(function ($) {
  //new HelloWorld()
  var headroom  = new Headroom($('header').get(0));
  headroom.init();

})($)
