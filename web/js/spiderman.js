$(document).ready(function (){
            /*
             * Masquer les tables des classes .table en ajoutant la classe hide-content.
             */
            $('.show-details').closest('div .panel').find('.table-details').addClass('hide-content');
            
            $('.show-details').on('click', function (){
                        $(this).closest('div .panel').find('.table-details').toggleClass("hide-content");
                    });
            $('#btn-print').on('click', function (event){
                event.preventDefault();
                        window.print();
                    });
                    
                    
                    var resteAPayer = +$('#net-a-payer').data('reste');
                    $('.reste').text(NumberToLetter(resteAPayer));
                    
                    
                    
            
                $('.modele-thumbnail').on('click',function(){
                    
                    var ex_img = $('#modele-big') ; 
                    ex_img.empty();

                    var src = $(this).data('source');
                    
                    var img = $('<img></img>',{
                        class:'img-responsive',
                        src:src
                    }).appendTo(ex_img).fadeIn();

                   
                });

            
        });
        
        
        
        
        
        
        
