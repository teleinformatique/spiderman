$(document).ready(function (){
            /*
             * Masquer les tables des classes .table en ajoutant la classe hide-content.
             */
            $('.show-details').closest('div .panel').find('.table-details').addClass('hide-content');
            
            $('.show-details').on('click', function (){
                        $(this).closest('div .panel').find('.table-details').toggleClass("hide-content");
                    });
            
        });
