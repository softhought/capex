(()=>{(function(){"use strict";$(".simple-line-chart").length&&$(".simple-line-chart").each(function(){let e=$(this),a=$(e)[0].getContext("2d"),l=new Chart(a,{type:"line",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"# of Votes",data:helper.randomNumbers(0,5,12),borderWidth:2,borderColor:()=>$(e).data("line-color")!==void 0?$(e).data("line-color"):getColor("primary",.8),backgroundColor:"transparent",pointBorderColor:"transparent",tension:.4}]},options:{maintainAspectRatio:!1,plugins:{legend:{display:!1}},scales:{x:{ticks:{display:!1},grid:{display:!1},border:{display:!1}},y:{ticks:{display:!1},grid:{display:!1},border:{display:!1}}}}});helper.watchClassNameChanges($("html")[0],s=>{l.update()})})})();})();
