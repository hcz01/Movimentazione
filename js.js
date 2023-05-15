
function openPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
    popup.addEventListener("click", closePopupOutside);
    document.addEventListener("keydown", closePopupEsc);
    load();

  }


  function closePopupOutside(event) {
    var popup = document.getElementById("popup");
    if (event.target === popup) {
      closePopup();
    }
  }

  function closePopupEsc(event) {
    if (event.key === "Escape") {
      closePopup();
    }
  }

  function closePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";

    popup.removeEventListener("click", closePopupOutside);
    document.removeEventListener("keydown", closePopupEsc);
  }


//open page for edit
function openPopup2() {
    var popup = document.getElementById("popup2");
    popup.style.display = "block";
    popup.addEventListener("click", closePopupOutside2);
    document.addEventListener("keydown", closePopupEsc2);
    load2();

  }
  function closePopupOutside2(event) {
    var popup = document.getElementById("popup2");
    if (event.target === popup) {
      closePopup2();
    }
  }

  function closePopupEsc2(event) {
    if (event.key === "Escape") {
      closePopup2();
    }
  }

  function closePopup2() {
    var popup = document.getElementById("popup2");
    popup.style.display = "none";
    document.getElementById('send').removeAttribute('onclick');
    popup.removeEventListener("click", closePopupOutside2);
    document.removeEventListener("keydown", closePopupEsc2);
  }


  
  function load () {
    
    $.ajax({
        url: 'getTableinfo.php',
        data: {
            request: 'tableInfo',
            table: 'heightFromGround'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('heightFromGround').innerHTML = ''
            result.map(r => document.getElementById('heightFromGround').innerHTML += `
            <option value=${ r.height }>${ r.height } cm</option>
            `)
        }
    })
    $.ajax({
        url: 'getTableinfo.php',
        data: {
            request: 'tableInfo',
            table: 'verticalDistance'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('verticalDistance').innerHTML = ''
            result.map(r => document.getElementById('verticalDistance').innerHTML += `
            <option value=${ r.dislocation }>${ r.dislocation } cm</option>
            `)
        }
    })
    $.ajax({
        url: 'getTableinfo.php',
        data: {
            request: 'tableInfo',
            table: 'horizontalDistance'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('horizontalDistance').innerHTML = ''
            result.map(r => document.getElementById('horizontalDistance').innerHTML += `<option value=${ r.distance }>${ r.distance } cm</option>`)
        } 
    })
    $.ajax({
        url: 'getTableinfo.php',
        data: {
            request: 'tableInfo',
            table: 'angularDisplacement'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('angularDisplacement').innerHTML = ''
            result.map(r => document.getElementById('angularDisplacement').innerHTML += `<option value=${ r.displacement }>${ r.displacement } °</option>`)
        }
    })
    $.ajax({
        url: 'getTableinfo.php',
        data: {
            request: 'tableInfo',
            table: 'gripValue'
        },
        dataType: 'json',
        success: (result) => {
            document.getElementById('gripValue').innerHTML = ''
            result.map(r => document.getElementById('gripValue').innerHTML += `<option value=${ r.value }>${ r.value }</option>`)
        }
    })
   
}

function modify(id) {
    openPopup2();
    edit(id);
}
function delect(id) {
    delectID(id);
}

function edit(id){

    $.ajax({
        url: 'getEvalutionById.php',
        dataType: 'json',
        data: {
            id: id
        },
        success: data => {
            data = data[0],
            console.log(data),
            document.getElementById('send').setAttribute('onclick', 'editOld(' + data.evaluation_id + ')'),
            document.getElementById('edit-businessName').value = data.businessName,
            document.getElementById('edit-cost').value = data.cost,
            document.getElementById('edit-date').value = data.date,
            document.getElementById('edit-realWeight').value = data.realWeight,
            document.getElementById('edit-heightFromGround').value = data.heightFromGround,
            document.getElementById('edit-verticalDistance').verticalDistance = data.verticalDistance,
            document.getElementById('edit-horizontalDistance').value = data.horizontalDistance,
            document.getElementById('edit-angularDisplacement').value = data.angularDisplacement,
            document.getElementById('edit-gripValue').value = data.gripValue
        },
        error: data => {
            console.log(data)
        }
    })
    }


function editOld(id){
    var businessName = $("#edit-businessName").val();
    var cost = $("#edit-cost").val();
    var date = $("#edit-date").val();
    var heightFromGround = parseFloat($("#edit-heightFromGround").val());
    var verticalDistance = parseFloat($("#edit-verticalDistance").val());
    var horizontalDistance = parseFloat($("#edit-horizontalDistance").val());
    var angularDisplacement = parseFloat($("#edit-angularDisplacement").val());
    var gripValue = $("#edit-gripValue").val();
    var realWeight = parseFloat($("#edit-realWeight").val());
    var frequency = $("#edit-frequency").val();
    var duration = $("#edit-duration").val();

    $.ajax({
        url: 'addValutazione.php',
        method: 'post',
        data: {
            businessName: businessName,
            cost: cost,
            date: date,
            heightFromGround: heightFromGround,
            verticalDistance: verticalDistance,
            horizontalDistance: horizontalDistance,
            angularDisplacement: angularDisplacement,
            gripValue: gripValue,
            realWeight: realWeight,
            frequency: frequency,
            duration: duration
           
        },
        success: function(response) {
            console.log(response);

        },
    })
    $.ajax({
        url: 'EditController.php',
        method: 'post',
        data: {
            action: 'edit',
            id:id
        },
        success: function(response) {
            console.log(response);

        },
    })
}


function delectID(id){
    $.ajax({
        url: 'EditController.php',
        method: 'post',
        data: {
            action: 'remove',
            id:id
        },
        success: function(response) {
            location.reload();

        },
    })
}
 function load2 () {
    
        $.ajax({
            url: 'getTableinfo.php',
            data: {
                request: 'tableInfo',
                table: 'heightFromGround'
            },
            dataType: 'json',
            success: (result) => {
                document.getElementById('edit-heightFromGround').innerHTML = ''
                result.map(r => document.getElementById('edit-heightFromGround').innerHTML += `
                <option value=${ r.height }>${ r.height } cm</option>
                `)
            }
        })
        $.ajax({
            url: 'getTableinfo.php',
            data: {
                request: 'tableInfo',
                table: 'verticalDistance'
            },
            dataType: 'json',
            success: (result) => {
                document.getElementById('edit-verticalDistance').innerHTML = ''
                result.map(r => document.getElementById('edit-verticalDistance').innerHTML += `
                <option value=${ r.dislocation }>${ r.dislocation } cm</option>
                `)
            }
        })
        $.ajax({
            url: 'getTableinfo.php',
            data: {
                request: 'tableInfo',
                table: 'horizontalDistance'
            },
            dataType: 'json',
            success: (result) => {
                document.getElementById('edit-horizontalDistance').innerHTML = ''
                result.map(r => document.getElementById('edit-horizontalDistance').innerHTML += `<option value=${ r.distance }>${ r.distance } cm</option>`)
            } 
        })
        $.ajax({
            url: 'getTableinfo.php',
            data: {
                request: 'tableInfo',
                table: 'angularDisplacement'
            },
            dataType: 'json',
            success: (result) => {
                document.getElementById('edit-angularDisplacement').innerHTML = ''
                result.map(r => document.getElementById('edit-angularDisplacement').innerHTML += `<option value=${ r.displacement }>${ r.displacement } °</option>`)
            }
        })
        $.ajax({
            url: 'getTableinfo.php',
            data: {
                request: 'tableInfo',
                table: 'gripValue'
            },
            dataType: 'json',
            success: (result) => {
                document.getElementById('edit-gripValue').innerHTML = ''
                result.map(r => document.getElementById('edit-gripValue').innerHTML += `<option value=${ r.value }>${ r.value }</option>`)
            }
        })
       
    }
