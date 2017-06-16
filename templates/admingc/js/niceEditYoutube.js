
var nicYouTubeOptions ={
    buttons :{
        'youtube':{
            name :'YouTube Link',
            type :'nicYouTubeButton'
        }
    },
    iconFiles :{
        'youtube':'/templates/admingc/img/youtube.png'
    }
}
/** START CONFIG */

var nicYouTubeButton = nicEditorAdvancedButton.extend({
    width :'350px',
    height :'350px',

    addPane :function(){
        this.addForm({
            '':{
                type :'title',
                txt :'YouTube Url'
            },
            'youTubeUrl':{
                type :'text',
                txt :'URL',
                value :'http://',
                style :{
                    width :'150px'
                }
            },
        });
    },

    submit :function(e){
        var code =this.inputs['youTubeUrl'].value;
        var width =560;
        var height =315;
        if(code.indexOf('watch?v=')>0){
            code = code.replace('watch?v=','embed/');
        }
        if(code.indexOf('youtube')==-1){
            code ="https://www.youtube.com/embed";
        }

        var youTubeCode ='<iframe width="'+ width +'" height="'+ height +'" src="'+ code +'" frameborder="0" allowfullscreen></iframe>';



        this.ne.selectedInstance.setContent(this.ne.selectedInstance.getContent()+ youTubeCode);
        this.removePane();
    }
});
nicEditors.registerPlugin(nicPlugin, nicYouTubeOptions);