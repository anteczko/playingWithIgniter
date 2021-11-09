<?php
    function displayError($error)
    {
        echo view('templates/websiteHeaderView');
        echo view('errors/registerErrorView', ['errors' => $error = ["Error!" => $error] ]);
    }

    function displayValidatorErrors($error)
    {
        echo view('templates/websiteHeaderView');
        echo view('errors/registerErrorView', ['errors' => $error]);
    }


    function displayErrorInModal($error){
        echo view('templates/websiteHeaderView');
        echo '
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">';
        echo view('errors/registerErrorView', ['errors' => $error = ["Error!" => $error] ]);
        echo'</div>
                </div>
            </div>';

        echo '<script> 
                    document.addEventListener("DOMContentLoaded",function(event){
                        var myModal=new bootstrap.Modal( document.getElementById(\'exampleModal\'),{keyboard:false})
                        console.log(myModal)
                        myModal.show();
                    })
                 </script>';
    }

function displayValidatorErrorsInModal($error){
        echo view('templates/websiteHeaderView');
        echo '
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">';
            echo view('errors/registerErrorView', ['errors' => $error]);
            echo'</div>
            </div>
        </div>';

        echo '<script> 
                document.addEventListener("DOMContentLoaded",function(event){
                    var myModal=new bootstrap.Modal( document.getElementById(\'exampleModal\'),{keyboard:false})
                    console.log(myModal)
                    myModal.show();
                })
             </script>';
    }

    function displayStringInModal($string){
        echo view('templates/websiteHeaderView');
        echo '
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <h1>'.$string.'</h1>
                </div>
            </div>
        </div>';

        echo '<script> 
                document.addEventListener("DOMContentLoaded",function(event){
                    var myModal=new bootstrap.Modal( document.getElementById(\'exampleModal\'),{keyboard:false})
                    console.log(myModal)
                    myModal.show();
                })
             </script>';

    }

    function modalShow($id){
        #TODO finish this function
        echo '<script> 
                document.addEventListener("DOMContentLoaded",function(event){
                    var myModal=new bootstrap.Modal( document.getElementById(\''.$id.'\'),{keyboard:false})
                    console.log(myModal)
                    myModal.show();
                })
             </script>';
    }
?>