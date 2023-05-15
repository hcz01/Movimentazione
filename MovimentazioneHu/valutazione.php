

<div id="popup" class="popup">
  <div class="popup-content">
    <div class="Page_close" onclick="closePopup()">X</div>
   
<div class="modal fade" id="newEvaluationModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuova valutazione</h1>
      </div>
      <div class="modal-body">
        <form action='addValutazione.php'>
        <label for="businessName">Ragione sociale</label>
        <input class="form-control my-2 text-center" name="businessName" id="businessName">  
        <label for="cost">Costo</label>
        <input class="form-control my-2 text-center" name="cost" id="cost">
        <label for="date">Data di emissione</label>
        <input class="form-control my-2 text-center" name="date" id="date" type="date">
        <label for="realWeight">Peso reale</label>
        <input class="form-control my-2 text-center" name="realWeight" id="realWeight" type="number">
        <label for="heightFromGround">Altezza da terra delle mani all'inizio del sollevamento</label>
        <select class="form-control my-2 text-center" name="heightFromGround" id="heightFromGround" type="number" >
            
        </select>
        <label for="verticalDistance">Distanza verticale di spostamento del peso fra inizio e fine sollevamento</label>
        <select class="form-control my-2 text-center" name="verticalDistance" id="verticalDistance" type="number" >

        </select>
        <label for="horizontalDistance">Distanza orizzontale tra mani e punto di mezzo delle caviglie</label>
        <select class="form-control my-2 text-center" name="horizontalDistance" id="horizontalDistance" type="number" >

        </select>
        <label for="angularDisplacement">Dislocazione angolare del peso in gradi</label>
        <select class="form-control my-2 text-center" name="angularDisplacement" id="angularDisplacement" type="number" >

        </select>
        <label for="gripValue">Giudizio sulla presa del carico</label>
        <select class="form-control my-2 text-center" name="gripValue" id="gripValue" type="number" >
          
        </select>
         <label for='frequency'>Frequenza dei gesti</label>
                <select required id='frequency' name='frequency' class='form-control my-2 text-center'>
                    <option value='0.2'>0.20 gesti/minuto</option>
                    <option value='1'>1 gesti/minuto</option>
                    <option value='4'>4 gesti/minuto</option>
                    <option value='6'>6 gesti/minuto</option>
                    <option value='9'>9 gesti/minuto</option>
                    <option value='12'>12 gesti/minuto</option>
                    <option value='15'>15 gesti/minuto</option>
                </select>
                <select required id='duration' name='duration' class='form-control my-2 text-center'>
                    <option value='< 1 ora'>< 1 ora</option>
                    <option value='da 1 a 2 ore'>da 1 a 2 ore</option>
                    <option value='da 2 a 8 ore'>da 2 a 8 ore</option>
                </select>
      </div>
      <label for='oneHand'>Sollevamento con una sola mano?</label>
                <input type='checkbox' id='oneHand' name='oneHand'><br />
                <label for='twoPeople'>Sollevamento fatto da due persone?</label>
                <input type='checkbox' id='twoPeople' name='twoPeople'><br />
                <br /><input type='submit' class='btn btn-success' value='Salva'>
            </form>
    </div>
  </div>
</div>
  </div>
</div>