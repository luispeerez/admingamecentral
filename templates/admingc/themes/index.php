<!DOCTYPE HTML> 
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrador Gamecentral</title>
        <?php 
        $this->print_css_tag('bootstrap');
        $this->print_css_tag('sb-admin');
        $this->print_css_tag('dropzone');
        $this->print_css_tag('jquery.datetimepicker');
        $this->print_css_tag('uploadify');
        $this->print_css_tag('footable.core.min');

        $this->print_css_tag();
        ?>
        <link rel="stylesheet" href="/templates/admingc/font-awesome/css/font-awesome.min.css">
        <link href="http://static.wixstatic.com/ficons/f0ce39_5bd31518a05d46fe8f0d57b61526d03e_fi.ico" rel="icon" type="image/x-icon" />
   
    </head>
    <body ng-app="gamecentral">
        <div id="wrapper" class="<?php echo $paginaActual ?>">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <?php $this->print_img_tag('gc.png'); ?> <span class="name">Administrador Gamecentral</span>
                    </a>
                </div>
                <?php $this->include_template('menu','global'); ?>
            </nav>

            <div id="page-wrapper">
                <?php $this->include_template($this->template,$this->location);?>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <?php $this->include_template('delete_box','global'); ?>
        <?php  
        $this->print_js_tag('jquery');
        $this->print_js_tag('jquery.datetimepicker');
        $this->print_js_tag('bootstrap');
        $this->print_js_tag('nicEdit');
        $this->print_js_tag('jquery.uploadify');
        $this->print_js_tag('swfobject');
        $this->print_js_tag('mxnphp-backend');
        $this->print_js_tag('footable');
        $this->print_js_tag('interactions');
        $this->print_js_tag('angular.min');
        $this->print_js_tag('controller');
        $this->print_js_tag('niceEditYoutube');

        ?>
        <script>
        nicEditors.registerPlugin(nicPlugin,nicYouTubeOptions);
        new nicEditor({fullPanel : true,iconsPath : '/templates/admingc/img/niceEditorIcons.gif'}).panelInstance('newPost');
        </script>

    </body>
</html>        