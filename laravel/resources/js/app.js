require('./bootstrap');

//  --------  SETTING TEMPLATE ON IMAGE CLICK ----------

$(function() {

  $('.element').on('click', function(){
     $('#image_BG').prop('src',this.src);
 
  });

    // CREAZIONE CANVAS
    let canvas = new fabric.Canvas('canvas');
    canvas.setHeight(450);
    canvas.setWidth(350);

    //NEW GRAPHIC IN CANVAS
    function updateGraphicImage(imageURL){
        if(!imageURL){
            canvas.clear();
        }
        fabric.Image.fromURL(imageURL, function(img) {
            
            img.scaleToHeight(150);
            img.scaleToWidth(150);
            canvas.centerObject(img);
            canvas.add(img);
        });
    }

    // -----------REMOVE GRAPHICS ----------------

    $("#delete").on('click', function(){
    
        deleteObjects();

    });

    function deleteObjects(){
        var activeObject = canvas.getActiveObject();
        if (activeObject) {
            if (confirm('Are you sure?')) {
                canvas.remove(activeObject);
                graphics_num--;
                console.log(graphics_num)
            }
        }
    }

    
    document.addEventListener("keydown", function(e) {
        var keyCode = e.keyCode;
        if(keyCode == 46){
            if (confirm('Are you sure?')) {
                canvas.remove(canvas.getActiveObject());
                graphics_num--;
                console.log(graphics_num)
            }   
        }
    }, false);

    var graphics_num = 0;
    var save = document.getElementById('save_btn');
    // var canc = document.getElementById('destroy');

    //USER SELECT A LOGO FROM THE LIST

    document.getElementById("tshirt-design").addEventListener("change", function(){
        updateGraphicImage(this.value);
        graphics_num++;
        console.log(graphics_num)
        console.log(this.value)
        }, false);

    //USERE SELECT A CUSTOM IMAGE    

    document.getElementById('customPicture').addEventListener("change", function(e){
        var reader = new FileReader();
        
        reader.onload = function (event){
            var imgObj = new Image();
            imgObj.src = event.target.result;
    
            // When the picture loads, create the image in Fabric.js
            imgObj.onload = function () {
                var img = new fabric.Image(imgObj);
    
                img.scaleToHeight(150);
                img.scaleToWidth(150); 
                canvas.centerObject(img);
                canvas.add(img);
                canvas.renderAll();
            };
        };
    
        // If the user selected a picture, load it
        if(e.target.files[0]){
            reader.readAsDataURL(e.target.files[0]);
        }
    }, false);


    //USER SELECT A COLOR

    document.getElementById("tshirt-color").addEventListener("change", function(){
        document.getElementById("img-container").style.backgroundColor = this.value;
    }, false);

        
    //------ SAVE CLICKED --------------
    save.addEventListener('click',function (){
        
        var input = document.getElementById("title");
        var nome_lavorazione = input.value;

        // console.log(nome_lavorazione);
       
        
        if (graphics_num != 0 && nome_lavorazione.length >= 6) {              
          
            var node = document.getElementById('img-container');
            domtoimage.toPng(node).then(function (dataUrl) {
        
            // console.log(dataUrl);
            sendData('post','http://localhost:8000/api/save',nome_lavorazione,dataUrl);    
        });
          
        }else{
            
            alert('Controlla il nome della lavorazione o inserisci almeno una grafica! ')

        }
          
    });

});

// -----------------------------FUNCTIONS--------------------------

function sendData(method,url,nome,img64){

    axios({
        method:method,
        url: url,
        data: {
            processing_name: nome,
            image: img64,
            
        }
    });

}
