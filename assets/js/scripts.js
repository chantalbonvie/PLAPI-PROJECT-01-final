

$(document).ready(function(){
    //Document is loaded, ready to run more code

var search_query = '';
var search_make = '';
var search_model = '';
var search_nickname = '';
var selected_year = 0;
var car_id = false;
cool_search();
    
    $("#search-form").on("submit", function(e){

        e.preventDefault();//prevent from refresh
    });

    // on keyup start searching cars

    $("#search-form #search-nickname").on("keyup", 
    function(){

        // Get the value in the search box
        // Send to php file
        // Return rows from php file that match
        // Replace table rows with new results

        search_query = search_nickname = $(this).val();
         //console.log(search_query);
        cool_search();

    }); //end of search keyup

    $("#search-form #search-model").on("keyup", 
    function(){

        // Get the value in the search box
        // Send to php file
        // Return rows from php file that match
        // Replace table rows with new results

        search_model = $(this).val();
         //console.log(search_model);
        cool_search();

    }); //end of search keyup


    $("#year-select").on("change", function(){
        selected_year = $(this).val();
        //console.log(selected_year);
        cool_search();
    });

    // On Delete Button
    $("#search-results").on("click", "[data-action=delete]", function(){
        //console.log($(this));
     car_id = $(this).data("car");
         

         $("#deleteCarAlert").modal("show");

    });

// On Delete Confirmation click
$("#deleteCarAlert").on("click", "[data-action=confirm-delete]", function(){
    console.log(car_id);
    $.ajax({
        url: "ajax/delete.php",
        type: "POST", 
        data:{
           id:car_id
        },
        success: function(result){
                console.log(result);
                $("#deleteCarAlert").modal("hide");
                car_id = false;
                cool_search();
        }
    });
});


    
    function cool_search(){
                 //put your post functions next
                 $.post(
                    'ajax/search.php', // url of file to call
                       {
                           search: search_query,
                           search_model: search_model,
                           search_nickname: search_nickname,
                           year: selected_year
       
                        }, //Data to be past to file by post
                        function(car_data){//on Complete function
                           //console.log(car_data);
       
                                   //now parse in to something useful translates
                                   //php json into useable 
                               if(car_data == "") return;
       
                               var cars = JSON.parse(car_data);
                                //console.log(cars[0].nickname );
       
       
                           var table_rows = '';
                                //for echat (index = i just returns cars in order
                                //then object
                       $.each(cars, function(i, car){
                           //console.log(car);
                           //the + is the same as concatante
                           table_rows += "<tr><td>"+
                           car.make+"</td><td>"+car.model+"</td><td>"+
                           car.year+"</td><td>"+car.nickname+
                            "</td><td>"+
                            "<button class='btn btn-danger' data-action='delete' data-car='"+
                            car.id+"'><i class='fas fa-trash'></i></button>"+
                           "</td> </tr>";
                       });
                           $("#search-results").html(table_rows);
       
                        }
                );
       

    }

    //end of cool search



}); //end of document ready