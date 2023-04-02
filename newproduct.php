<form method="post" action="save_product.php">
  <label for="sku">SKU:</label>
  <input type="text" id="sku" name="sku" required><br>

  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br>

  <label for="price">Price ($):</label>
  <input type="number" id="price" name="price" min="0" step="0.01" required><br>

  <label for="product_type">Product Type:</label>
  <select id="product_type" name="product_type" required>
    <option value="">Select Product Type</option>
    <option value="dvd">DVD-disc</option>
    <option value="book">Book</option>
    <option value="furniture">Furniture</option>
  </select><br>

  <div id="product_attributes">
    <!-- product-specific attributes will be added dynamically here -->
  </div>

  <button type="submit">Save</button>
</form>

<script>
  const productTypeSelect = document.getElementById('product_type');
  const productAttributesDiv = document.getElementById('product_attributes');

  productTypeSelect.addEventListener('change', function() {
    const productType = this.value;
    productAttributesDiv.innerHTML = '';

    switch (productType) {
      case 'dvd':
        addInputField('Size (MB)', 'size_mb');
        break;
      case 'book':
        addInputField('Weight (Kg)', 'weight');
        break;
      case 'furniture':
        addInputField('Height (cm)', 'height');
        addInputField('Width (cm)', 'width');
        addInputField('Length (cm)', 'length');
        break;
    }
  });

  function addInputField(labelText, inputName) {
    const label = document.createElement('label');
    label.for = inputName;
    label.innerText = labelText;

    const input = document.createElement('input');
    input.type = 'number';
    input.id = inputName;
    input.name = inputName;
    input.required = true;

    productAttributesDiv.appendChild(label);
    productAttributesDiv.appendChild(input);
    productAttributesDiv.appendChild(document.createElement('br'));
  }
</script>


