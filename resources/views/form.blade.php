<div id="form" style="display: none">
    <div class="form-floating">
        <input id="name" type="text" class="form-control form-data form-control-sm" name="name" placeholder="Name" required>
        <label for="name" class="form-label form-control-sm">Name: *</label>
    </div>
    <div class="form-floating">
        <input id="nickname" type="text" class="form-control form-data form-control-sm" name="nickname" placeholder="Nickname">
        <label for="nickname" class="form-label form-control-sm">Nickname</label>
    </div>
    <div class="mb-12 form-floating">
        <input id="weight" type="number" class="form-control form-data form-control-sm" name="weight" placeholder="Weight" min="0.00" step=".01" required>
        <label for="weight" class="form-label form-control-sm">Weight: *</label>
    </div>
    <div class="mb-12 form-floating">
        <input id="height" type="number" class="form-control form-data form-control-sm" name="height" placeholder="Height" min="0.00" step=".01" required>
        <label for="height" class="form-label form-control-sm">Height: *</label>
    </div>
    <div class="mb-12 form-floating">
        <select id="gender" class="form-control form-data form-control-sm" name="gender" placeholder="Gender" required>
            <option value="" disabled selected></option>
            <option value="F">Female</option>
            <option value="M">Male</option>
        </select>
        <label for="gender" class="form-label form-control-sm">Gender: *</label>
    </div>
    <div class="mb-12 form-floating">
        <input id="color" type="text" class="form-control form-data form-control-sm" name="color" placeholder="Color">
        <label for="color" class="form-label form-control-sm">Color</label>
    </div>
    <div class="mb-12 form-floating">
        <select id="is_friendly" class="form-control form-data form-control-sm" name="is_friendly" placeholder="Friendliness">
            <option value="" disabled selected></option>
            <option value="1">Friendly</option>
            <option value="0">Not friendly</option>
        </select>
        <label for="is_friendly" class="form-label form-control-sm">Friendliness:</label>
    </div>
    <div class="mb-12 form-floating">
        <input id="birth_date" type="text" class="form-control form-data form-control-sm datepicker" name="birth_date" placeholder="Birthdate" required>
        <label for="birth_date" class="form-label form-control-sm">Birthdate: *</label>
    </div>
</div>
