jQuery(document).ready(function(){if(!jQuery(".scp_notification").find(".icon").length){jQuery(".scp_notification").append("<div class='icon'></div>").css("position","relative")}jQuery(".canhide").append("<div class='close-notification'></div>").css("position","relative");jQuery(".close-notification").click(function(){jQuery(this).hide();jQuery(this).parent().fadeOut(700)})});