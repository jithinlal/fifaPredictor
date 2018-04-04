/**
 * jQuery TinyMCE config
 */
$(document).ready(function() {
        tinyMCE.init({
                theme : "modern",
                mode : "specific_textareas",
                editor_selector : "editor",
                plugins : "contextmenu,charmap,autolink,link,lists,media,code",
                theme_advanced_toolbar_location : "top",
                height: "300px",
                width: "100%"
            }
        );
    }
);
