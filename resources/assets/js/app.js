!function(a){a.fn.nicefileinput=function(b){var c={label:"Browse...",fullPath:!1};return b&&a.extend(c,b),this.each(function(){var b=this;if(void 0===a(b).attr("data-styled")){var d=Math.round(1e4*Math.random()),e=new Date,f=e.getTime()+d.toString(),g=a('<input type="text" readonly="readonly">').css({display:"block","float":"left",margin:0,padding:"0 5px"}).addClass("NFI-filename NFI"+f),h=a("<div>").css({overflow:"hidden",position:"relative",display:"block","float":"left","white-space":"nowrap","text-align":"center"}).addClass("NFI-button NFI"+f).html(c.label);a(b).after(g),a(b).wrap(h),a(".NFI"+f).wrapAll('<div class="NFI-wrapper" id="NFI-wrapper-'+f+'" />'),a(".NFI-wrapper").css({overflow:"auto",display:"inline-block"}),a("#NFI-wrapper-"+f).addClass(a(b).attr("class")),a(b).css({opacity:0,position:"absolute",border:"none",margin:0,padding:0,top:0,right:0,cursor:"pointer",height:"60px"}).addClass("NFI-current"),a(b).on("change",function(){var d=a(b).val();if(c.fullPath)g.val(d);else{var e=d.split(/[/\\]/);g.val(e[e.length-1])}}),a(b).attr("data-styled",!0)}})}}(jQuery);

$(document).ready(function(){
    $("input[type=file].single-file-upload").nicefileinput({
        label : '<i class="icone-imagem"></i>'
    });

    Dropzone.options.dropzoneTelas = {

        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        previewsContainer: '.dropzone-previews',
        addRemoveLinks: true,
        dictDefaultMessage: "Arraste as telas aqui",
        dictFallbackMessage: "Seu browser não possui as funcionalidade de arrastar e soltar.",
        dictFallbackText: "Por favor utilize o browser sugerido abaixo.",
        dictFileTooBig: "Seu arquivo é muito grande ({{filesize}}Mb). Tamanho máximo: {{maxFilesize}}Mb.",
        dictInvalidFileType: "Não é possível fazer upload de arquivos desse tipo.",
        dictResponseError: "O servidor respondeu com o código {{statusCode}}.",
        dictCancelUpload: "Cancelar upload",
        dictCancelUploadConfirmation: "Tem certeza que deseja cancelar o upload?",
        dictRemoveFile: "Remover arquivo",
        dictRemoveFileConfirmation: null,
        dictMaxFilesExceeded: "Não é possível incluir mais arquivos.",

        init: function() {
            var myDropzone = this;
            var submitButton = this.element.querySelector("button[type=submit]");

            submitButton.classList.add('disabled');
            submitButton.addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (!this.classList.contains('disabled')) {
                    myDropzone.processQueue();
                }
            });

            this.on("addedfile", function() {
                submitButton.classList.remove('disabled');
            });
            this.on("sendingmultiple", function() {
                submitButton.classList.add('disabled');
            });
            this.on("successmultiple", function(files, response) {
                location.reload();
            });
            this.on("errormultiple", function(files, response) {
                submitButton.classList.remove('disabled');
                this.removeAllFiles(true);
                for (i = 0; i < files.length; i++) {
                    this.addFile(files[i]);
                }
                swal('Atenção', 'Todos os campos são obrigatórios!', 'error');
            });
        }

    }
});

var app = new Vue({
    el: '#app',
    data: {
        teste: 'variavel'
    }
});