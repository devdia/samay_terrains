!function(e){var n={};function t(a){if(n[a])return n[a].exports;var o=n[a]={i:a,l:!1,exports:{}};return e[a].call(o.exports,o,o.exports,t),o.l=!0,o.exports}t.m=e,t.c=n,t.d=function(e,n,a){t.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:a})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,n){if(1&n&&(e=t(e)),8&n)return e;if(4&n&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(t.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&n&&"string"!=typeof e)for(var o in e)t.d(a,o,function(n){return e[n]}.bind(null,o));return a},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},t.p="/",t(t.s=68)}({68:function(e,n,t){e.exports=t(69)},69:function(e,n){!function(e){e(".table-editable").dataTable({columns:[{name:"id"},{name:"age"},{name:"qty"},{name:"cost"}],bPaginate:!1,fnRowCallback:function(t,a,o,l){e(".editable").editable({mode:"inline",success:function t(a,o){var l=new e.fn.dataTable.Api(".table").cell("td.focus"),r=l.data(),i=document.createElement("div");i.innerHTML=r,i.childNodes.innerHTML=o,console.log("jml a new "+i.innerHTML),l.data(i.innerHTML),n(e(l.node())),e("td.focus a").editable({mode:"inline",success:t})}})},autoFill:{columns:[1,2]},keys:!0});function n(e){var n=e.attr("data-original-value");if(n){var t=e.text();isNaN(n)||(n=parseFloat(n)),isNaN(t)||(t=parseFloat(t)),n===t?e.removeClass("cat-cell-modified").addClass("cat-cell-original"):e.removeClass("cat-cell-original").addClass("cat-cell-modified")}}e("a[data-pk]").on("hidden",(function(t,a){n(e(this).parent("td"))})),e(".table").DataTable().on("autoFill",(function(t,a,o){e.each(o,(function(t,a){var o=a[0].cell;n(e(o.node()))}))}))}(jQuery)}});