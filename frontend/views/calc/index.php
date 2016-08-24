<form action="" id="cakeform" onsubmit="return false;">
   <fieldset>
    <legend>Estimate Calculator!</legend><br />
    <label >Type of estimate</label>
    <input type="radio"  name="selectedcake" value="Round6"
    onclick="calculateTotal()" />
    General
    <input type="radio"  name="selectedcake" value="Round8"
    onclick="calculateTotal()" />
    Termite
    <input type="radio"  name="selectedcake" value="Round10"
    onclick="calculateTotal()" />
    Cleaning <br />
 
    <label >Filling</label>
 
    <select id="filling" name='filling'
    onchange="calculateTotal()">
    <option value="None">Select Filling</option>
    <option value="Lemon">Lemon($5)</option>
    <option value="Custard">Custard($5)</option>
    <option value="Fudge">Fudge($7)</option>
    <option value="Mocha">Mocha($8)</option>
    <option value="Raspberry">Raspberry($10)</option>
    <option value="Pineapple">Pineapple($5)</option>
    <option value="Dobash">Dobash($9)</option>
    <option value="Mint">Mint($5)</option>
    <option value="Cherry">Cherry($5)</option>
    <option value="Apricot">Apricot($8)</option>
    <option value="Buttercream">Buttercream($7)</option>
    <option value="Chocolate Mousse">Chocolate Mousse($12)</option>
   </select>
    <br/>
    <p>
    <label for='includecandles' class="inlinelabel">
    Include Candles($5)</label>
    <input type="checkbox" id="includecandles" name='includecandles'
    onclick="calculateTotal()" />
   </p>
 
    <p>
    <label class="inlinelabel" for='includeinscription'>
    Include Inscription($20)</label>
    <input type="checkbox" id="includeinscription"
    name="includeinscription" onclick="calculateTotal()" />
 
    <input type="text"  id="theinscription"
    name="theinscription" value="Enter Inscription"  />
    </p>
    <div id="totalPrice"></div>
    
    <p>Price: <input type="text" name="price"
    size="5" /></p>
    
    <p>Quantity: <input type="text"
    name="quantity" size="5" /></p>
    
    <p>Discount: <input type="text"
    name="discount" size="5" /></p>
    
    <p>Tax: <input type="text" name="tax"
    size="3" /> (%)</p>
    
    <p>Shipping method: <select
    name="shipping">
  <option value="5.00">Slow and steady
    </option>
  <option value="8.95">Put a move on it.
    </option>
  <option value="19.36">I need it
    yesterday!</option>
  </select></p>

  <p>Number of payments to make:
    <input type="text" name="payments"
    size="3" /></p>

  <input type="submit" name="submit"
    value="Calculate!" />
 
    </fieldset>
</form>