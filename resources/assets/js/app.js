!function(a){a.fn.nicefileinput=function(b){var c={label:"Browse...",fullPath:!1};return b&&a.extend(c,b),this.each(function(){var b=this;if(void 0===a(b).attr("data-styled")){var d=Math.round(1e4*Math.random()),e=new Date,f=e.getTime()+d.toString(),g=a('<input type="text" readonly="readonly">').css({display:"block","float":"left",margin:0,padding:"0 5px"}).addClass("NFI-filename NFI"+f),h=a("<div>").css({overflow:"hidden",position:"relative",display:"block","float":"left","white-space":"nowrap","text-align":"center"}).addClass("NFI-button NFI"+f).html(c.label);a(b).after(g),a(b).wrap(h),a(".NFI"+f).wrapAll('<div class="NFI-wrapper" id="NFI-wrapper-'+f+'" />'),a(".NFI-wrapper").css({overflow:"auto",display:"inline-block"}),a("#NFI-wrapper-"+f).addClass(a(b).attr("class")),a(b).css({opacity:0,position:"absolute",border:"none",margin:0,padding:0,top:0,right:0,cursor:"pointer",height:"60px"}).addClass("NFI-current"),a(b).on("change",function(){var d=a(b).val();if(c.fullPath)g.val(d);else{var e=d.split(/[/\\]/);g.val(e[e.length-1])}}),a(b).attr("data-styled",!0)}})}}(jQuery);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

Dropzone.autoDiscover = false;

$(document).ready(function(){
    $("input[type=file].single-file-upload").nicefileinput({
        label : '<i class="icone-imagem"></i>'
    });

    $('body').on('click', '.file-upload-link:not(.disabled)', function() {
        $("#imagem-"+$(this).data('tela')).click();
    });

    $('body').on('change', '[data-auto-file-upload]', function() {
        $("#form-"+$(this).attr('id')).submit();
    });

    $('body').popover({
        selector: '[data-toggle="popover"]',
        placement: 'bottom'
    });

    $('.dropzone-single').dropzone({
        uploadMultiple: true,
        parallelUploads: 100,
        maxFiles: 100,
        dictDefaultMessage: "<i class='icone-adicionar'></i>Adicionar tela",
        successmultiple: function(files, response) {
            location.reload();
        },
        errormultiple: function(files, response) {
            this.removeAllFiles(true);
            for (i = 0; i < files.length; i++) {
                this.addFile(files[i]);
            }
            swal('Atenção', 'Ocorreu um erro no upload dos arquivos. Tente novamente!', 'error');
        }
    });

    $('#dropzone-telas').dropzone({
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

    });

    if ($('#lista-projetos').length) {
        window.listaProjetos = new Vue({
            el: '#lista-projetos',
            ready: function() {
                this.buscarProjetos();
            },
            data: {
                ativo: 1,
                inativo: 0
            },
            methods: {
                buscarProjetos: function() {
                    this.$http.get('/projetos/buscar', function(projetos) {
                        this.$set('projetos', projetos);
                    })
                },
                mudaVisibilidade: function(projeto) {
                    if (projeto.status == 1) {
                        this.$http.patch('/projetos/'+projeto.id+'/desativar', function(response) {
                            projeto.status = 0;
                        });
                    } else {
                        this.$http.patch('/projetos/'+projeto.id+'/ativar', function(response) {
                            projeto.status = 1;
                        });
                    }
                }
            }
        });
    }

    if ($('#lista-telas').length) {
        window.listaTelas = new Vue({
            el: '#lista-telas',
            props: ['projeto'],
            ready: function() {
                this.buscarTelas();
            },
            data: {
                ativo: 1,
                inativo: 0
            },
            methods: {
                buscarTelas: function() {
                    this.$http.get('/telas/'+this.projeto+'/buscar', function(telas) {
                        this.$set('telas', telas);
                    })
                },
                mudaVisibilidade: function(tela) {
                    if (tela.status == 1) {
                        this.$http.patch('/telas/'+tela.id+'/desativar', function(response) {
                            tela.status = 0;
                        });
                    } else {
                        this.$http.patch('/telas/'+tela.id+'/ativar', function(response) {
                            tela.status = 1;
                        });
                    }
                },
                excluir: function(tela_id) {
                    that = this;
                    swal({
                        title: "Atenção",
                        text: "Essa ação não pode ser desfeita!\nTem certeza que deseja realizar a exclusão?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD4B39",
                        confirmButtonText: "Sim, tenho certeza!",
                        cancelButtonText: "Não",
                        showLoaderOnConfirm: true,
                        closeOnConfirm: false
                    }, function () {
                        that.$http.delete('/telas/'+tela_id, function(response) {
                            for(i = 0; i < that.telas.length; i++) {
                                if (that.telas[i].id == tela_id) {
                                    that.telas.splice(i, 1);
                                }
                            }
                            swal("Sucesso!", response, "success");
                        });
                    });
                }
            }
        });
    }

    if ($('#pagina-externa').length) {
        window.paginaExterna = new Vue({
            el: '#pagina-externa',
            props: ['principal', 'codigo'],
            data: {
                atual: null
            },
            ready: function() {
                this.buscarApresentacoes(this.principal);
            },
            methods: {
                buscarApresentacoes: function (dispositivo) {
                    var that = this;
                    this.$http.get(this.codigo+'/apresentacoes/'+dispositivo, function(apresentacoes) {
                        that.$set('apresentacoes', apresentacoes);
                        that.$set('apresentacao', null);
                        that.$set('telas', []);
                        that.$set('tela', null);
                        that.$set('atual', null);
                    });
                    this.$set('dispositivo', dispositivo);
                },
                buscarTelas: function (apresentacao) {
                    var that = this;
                    this.$http.get(this.codigo+'/apresentacoes/'+apresentacao+'/telas', function(telas) {
                        that.$set('telas', telas);
                        that.$set('tela', null);
                        that.$set('atual', null);
                    });
                },
                telaAtual: function (tela) {
                    for(var i = 0; i < this.telas.length; i++) {
                        if (this.telas[i].value == tela) {
                            var that = this;
                            this.$http.get(this.codigo+'/apresentacoes/'+this.apresentacao+'/telas/'+tela, function(tela) {
                                that.$set('atual', tela);
                            });
                        }
                    }
                }
            }
        });
    }

    if ($('#lista-marcadores').length) {
        window.listaMarcadores = new Vue({
            el: '#lista-marcadores',
            props: ['tela'],
            data: {
                area: false,
                editando: false,
                editandoId: null,
                marcador: {
                    descricao: ''
                }
            },
            ready: function() {
                $.fn.editable.defaults.url = '/telas/'+this.tela+'/marcadores';
                $.fn.editable.defaults.ajaxOptions = {
                    'headers' : {
                        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
                    }
                };
                $.fn.editableform.buttons = '<div class="row"><div class="col-xs-6"><button type="submit" class="btn btn-success btn-block editable-submit">Salvar</button></div><div class="col-xs-6"><button type="button" class="btn btn-primary btn-block editable-cancel">Excluir</button></div></div>';
                $('#lista-marcadores').editable({
                    selector: '.marcador',
                    placement: 'bottom',
                    type: 'textarea',
                    showbuttons: 'bottom',
                    autotext: 'never',
                    display: function(value, sourceData) {
                        $(this).html('+');
                    },
                    emptytext: '+',
                    rows: 5,
                    success: function(response, newValue) {
                        $(this).attr('data-pk', response['id'].toString());
                        $(this).attr('data-value', response['descricao']);
                        $(this).editable('option', 'pk', response['id']);
                        $(this).editable('option', 'value', response['descricao']);
                    }
                });
            },
            methods: {
                removerMarcadorUI: function(id) {
                    $('.marcador[data-pk="'+id+'"]').remove();
                    if (id.toString() != '0') {
                        this.$http.delete('/telas/'+this.tela+'/marcadores/'+id, function(response) {});
                    }
                },
                abrirPopover: function(id) {
                    $('.marcador[data-pk="'+id+'"]').click();
                },
                incluiMarcador: function(e) {
                    if ($(e.target).hasClass('container-marcadores')){
                        if (this.editando && this.editandoId == 0) {
                            this.removerMarcadorUI(0);
                        }
                        $(e.target).append('<div name="marcador" class="marcador editable-click editable-empty" data-value="" data-pk="0" data-params="{y:'+ (e.offsetY-20) +', x:'+ (e.offsetX-21) +'}" style="top: '+ (e.offsetY-20) +'px; left: '+ (e.offsetX-21) +'px;">+</div>');
                        this.editando = true;
                        this.editandoId = 0;
                        this.abrirPopover(0);
                    } else if ($(e.target).hasClass('marcador')) {
                        this.editando = true;
                        this.editandoId = e.target.dataset.pk;
                    } else if ($(e.target).hasClass('editable-cancel')) {
                        this.editando = false;
                        this.removerMarcadorUI(this.editandoId);
                        this.editandoId = 0;
                    }
                },
                areaUtil: function() {
                    this.area = !this.area;
                    $('.container-marcadores').toggleClass('area-exibida');
                }
            }
        });
    }
});