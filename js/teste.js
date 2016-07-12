$(function ()
{
   $(window).load(function()
   {
      $(function () {

			var currentTime = new Date();
			var month = currentTime.getMonth()+"";if(month.length==1)  month="0"+month;
			var day = currentTime.getDate()+"";if(day.length==1) day="0" +day;
			var year = currentTime.getFullYear();
			var date = day + "/" + month + "/" + year;
         alert(date);
		})
   })
});
// Exibindo data no input ao iniciar tarefa
//var d = new Date();
//dataHora = (d.toLocaleString());
//alert(d.toLocaleString());
//alert(dataHora);
