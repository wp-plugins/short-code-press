 
(function() {

    tinymce.create('tinymce.plugins.wpsb_tinyplugin', {

        init : function(ed, url){            
            ed.addCommand('wpsb_buttons', function() {
                                ed.windowManager.open({
                                        title: 'Short Code Press',
                                        file : 'admin.php?wpsb_action=wpsb_tinymce_button',
                                        height: 400,
                                        width:550,                                        
                                        inline : 1
                                }, {
                                        plugin_url : url, // Plugin absolute URL
                                        some_custom_arg : 'custom arg' // Custom argument
                                });
                        });
            
            ed.addButton('wpsb_tinyplugin', {
                title : 'Insert Short Codes',
                cmd : 'wpsb_buttons',
                image:  url+"/images/buttons.png"
            });
        },                       

        getInfo : function() {
            return {
                longname : 'SCP - Shortcode Press',
                author : 'Shaid',
                authorurl : 'http://www.shortcodepress.com',
                infourl : 'http://www.shortcodepress.com',
                version : "1.0"
            };
        }
    });

    tinymce.PluginManager.add('wpsb_tinyplugin', tinymce.plugins.wpsb_tinyplugin);
    
})();
