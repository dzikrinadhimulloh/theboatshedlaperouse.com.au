(()=>{"use strict";var e,o={36:(e,o,r)=>{const t=jQuery;!function(e){function o(){e("html").css("--scrollbar-size",e(window).outerWidth()-e(window).width()+"px")}new Headroom(e("header").get(0)).init(),e(window).scrollTop()>0&&e("header").addClass("headroom--unpinned"),o();var r=e(window).width();e(window).on("resize",(function(){r!==e(window).width()&&o()}));new Swiper(".swiper",{direction:"horizontal",slidesPerView:"auto",scrollbar:{el:".swiper-scrollbar"}}),new Swiper(".swiper-blog",{direction:"horizontal",slidesPerView:"auto"});e(document).on("click",'[href="#open-menu"]',(function(o){o.preventDefault();var r=e(".menu-panel");r.toggleClass("opened"),r.hasClass("active")?(r.addClass("opacity-0"),setTimeout((function(){e("html").removeClass("disable-scroll")}),150),setTimeout((function(){r.removeClass("active"),r.addClass("z-[-1]")}),200)):(r.addClass("active"),r.removeClass("z-[-1]"),e("html").addClass("disable-scroll"),setTimeout((function(){r.removeClass("opacity-0")}),100))})),gsap.registerPlugin(ScrollTrigger);gsap.utils.toArray(".parallax-bg").forEach((function(o,r){var t=e(o).parent().get(0);gsap.fromTo(o,{backgroundPosition:function(){return"50% 0px"}},{backgroundPosition:function(){return"50% ".concat(-.3*window.innerHeight*function(e){return window.innerHeight/(window.innerHeight+e.offsetHeight)}(t),"px")},ease:"none",scrollTrigger:{trigger:o,start:function(){return r?"top bottom":"top top"},end:"bottom top",scrub:!0}})}))}(r.n(t)())},309:()=>{},801:()=>{}},r={};function t(e){var n=r[e];if(void 0!==n)return n.exports;var i=r[e]={exports:{}};return o[e](i,i.exports,t),i.exports}t.m=o,e=[],t.O=(o,r,n,i)=>{if(!r){var a=1/0;for(u=0;u<e.length;u++){for(var[r,n,i]=e[u],s=!0,l=0;l<r.length;l++)(!1&i||a>=i)&&Object.keys(t.O).every((e=>t.O[e](r[l])))?r.splice(l--,1):(s=!1,i<a&&(a=i));if(s){e.splice(u--,1);var d=n();void 0!==d&&(o=d)}}return o}i=i||0;for(var u=e.length;u>0&&e[u-1][2]>i;u--)e[u]=e[u-1];e[u]=[r,n,i]},t.n=e=>{var o=e&&e.__esModule?()=>e.default:()=>e;return t.d(o,{a:o}),o},t.d=(e,o)=>{for(var r in o)t.o(o,r)&&!t.o(e,r)&&Object.defineProperty(e,r,{enumerable:!0,get:o[r]})},t.o=(e,o)=>Object.prototype.hasOwnProperty.call(e,o),(()=>{var e={94:0,177:0,691:0};t.O.j=o=>0===e[o];var o=(o,r)=>{var n,i,[a,s,l]=r,d=0;if(a.some((o=>0!==e[o]))){for(n in s)t.o(s,n)&&(t.m[n]=s[n]);if(l)var u=l(t)}for(o&&o(r);d<a.length;d++)i=a[d],t.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return t.O(u)},r=self.webpackChunktheboatshedlaperouse=self.webpackChunktheboatshedlaperouse||[];r.forEach(o.bind(null,0)),r.push=o.bind(null,r.push.bind(r))})(),t.O(void 0,[177,691],(()=>t(36))),t.O(void 0,[177,691],(()=>t(801)));var n=t.O(void 0,[177,691],(()=>t(309)));n=t.O(n)})();