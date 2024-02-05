<div class="card ms-4 me-4 mt-4 mb-4">
    <div class="card-header">
        <h5 class="card-title">Formulário Dados Pessoais</h5>
    </div>
    <div class="card-body">
        <form class="was-validated">
            <div class="mb-3">
                <label for="validationTextarea" class="form-label">Textarea</label>
                <textarea class="form-control form-control-sm is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">
                    Please enter a message in the textarea.
                </div>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                <label class="form-check-label" for="validationFormCheck1">Check this checkbox</label>
                <div class="invalid-feedback">Example invalid feedback text</div>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" id="validationFormCheck2" name="radio-stacked" required>
                <label class="form-check-label" for="validationFormCheck2">Toggle this radio</label>
            </div>
            <div class="form-check mb-3">
                <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
                <label class="form-check-label" for="validationFormCheck3">Or toggle this other radio</label>
                <div class="invalid-feedback">More example invalid feedback text</div>
            </div>
            <div class="form-check mb-3">
                <label for="customRange2" class="form-label">Example range</label>
                <input type="range" class="form-range" min="0" max="5" id="customRange2">
            </div>
            <div class="mb-3">
                <select class="form-select form-select-sm" required aria-label="select example">
                    <option value="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="invalid-feedback">Example invalid select feedback</div>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control form-control-sm" aria-label="file example" required>
                <div class="invalid-feedback">Example invalid form file feedback</div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary btn-sm" type="submit" disabled>Submit form</button>
            </div>
        </form>
    </div>
    <div class="card-footer text-right">
        Sistema desenvolvido pela empresa Habilidade.Com
    </div>
</div>
