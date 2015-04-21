/**
 * Created by root on 4/18/15.
 */

  var youtubeId = $("#s2_modulebundle_module_youtubeId").val();
  $("#youtube-preview").html("<iframe src=\"https://www.youtube.com/embed/" + youtubeId +"\" frameborder=\"0\" allowfullscreen></iframe>");
 $("#s2_modulebundle_module_youtubeId").change(function(){
     var youtubeId = $("#s2_modulebundle_module_youtubeId").val();
     $("#youtube-preview").html("<iframe src=\"https://www.youtube.com/embed/" + youtubeId +"\" frameborder=\"0\" allowfullscreen></iframe>");

 })