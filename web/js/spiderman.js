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
            
        });
        
        
        
