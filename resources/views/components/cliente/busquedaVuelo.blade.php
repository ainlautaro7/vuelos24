<!-- listarVuelos(Origen, destino, fecha ida, fecha vuelta, tipo viaje, cantidad mayores, cantidad menores, cantidad bebés, clase) -->
<div class="container-busqueda-vuelo">
    <h4 class="text-left mb-3">Encontrá los mejores vuelos con reserva flexible.</h4>
    <form action="{{ route('vuelo.buscar') }}" method="POST">
        @csrf

        <!-- ida o ida y vuelta -->
        <div class="input-group my-2">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipoBoleto" id="idaVuelta" value="idaVuelta" onchange="javascript:showContent()" disabled>
                <label class="form-check-label" for="idaVuelta">
                    Ida y vuelta
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input mx-2" type="radio" name="tipoBoleto" id="ida" value="ida" onchange="javascript:showContent()" checked>
                <label class="form-check-label" for="ida">
                    Solo ida
                </label>
            </div>
        </div>

        <div class="input-group">
            <!-- origen -->
            <div class="me-2">
                <label for="origen">Salgo de</label>
                <input type="text" id="origen" name="origen" placeholder="Ingrese una ciudad"
                    aria-label="Ingrese una ciudad" class="form-control" value="<?php if(isset($form)){echo $form->origen;}?>" required>
            </div>

            <!-- destino -->
            <div class="mx-2">
                <label for="destino">Voy a</label>
                <input type="text" id="destino" name="destino" placeholder="Ingrese una ciudad"
                    aria-label="Ingrese una ciudad" class="form-control" value="<?php if(isset($form)){echo $form->destino;}?>" required>
            </div>

            <!-- fecha ida -->
            <div class="mx-2">
                <label for="fechaIda">Fecha ida</label>
                <input type="date" id="fechaIda" name="fechaIda" placeholder="Fecha vuelo" aria-label="Fecha vuelo"
                    class="form-control" min="{{ date('Y-m-d') }}" value="<?php if(isset($form)){echo $form->fechaIda;}?>" required>
            </div>

            <!-- fecha vuelta -->
            <div class="mx-2" id="fechaVuelta" style="display: none">
                <label for="fechaVuelta">Fecha vuelta</label>
                <input type="date" id="fechaVuelta" name="fechaVuelta" placeholder="Fecha vuelo"
                    aria-label="Fecha vuelo" class="form-control" min="{{ date('Y-m-d') }}" value="<?php if(isset($form)){echo $form->fechaVuelta;}?>">
            </div>

            <!-- clase -->
            <div class="ms-2">
                <label for="claseBoleto">Clase</label>
                <select name="claseBoleto" id="claseBoleto" class="form-select" aria-label="Clase de boleto">
                    <option value="todas" <?php if(isset($form->claseBoleto)){if($form->claseBoleto == "todas"){echo "selected";}}?>>Todas</option>
                    <option value="primera" <?php if(isset($form->claseBoleto)){if($form->claseBoleto == "primera"){echo "selected";}}?>>Primera</option>
                    <option value="business" <?php if(isset($form->claseBoleto)){if($form->claseBoleto == "business"){echo "selected";}}?>>Business</option>
                    <option value="turista" <?php if(isset($form->claseBoleto)){if($form->claseBoleto == "turista"){echo "selected";}}?>>Turista</option>
                </select>
            </div>
        </div>

        <!-- personas -->
        <div class="my-3">
            <label>Cantidad personas</label>
            <div class="input-group">

                <div class="me-2">
                    <label for="cantAdultos">Adultos</label>
                    <div class="input-group">
                        <input type="number" name="cantAdultos" id="cantAdultos" class="form-control cantPersonas"
                            value="<?php if(isset($form)){echo $form->cantAdultos;}else{echo 1;}?>" min="1">
                    </div>
                </div>

                <div class="mx-2">
                    <label for="cantMenores">Menores</label>
                    <div class="input-group">
                        <input type="number" name="cantMenores" id="cantMenores" class="form-control cantPersonas"
                            value="<?php if(isset($form)){echo $form->cantMenores;}else{echo 0;}?>" min="0">
                    </div>
                </div>

                <div class="mx-2">
                    <label for="cantBebes">Bebes</label>
                    <div class="input-group">
                        <input type="number" name="cantBebes" id="cantBebes" class="form-control cantPersonas"
                            value="<?php if(isset($form)){echo $form->cantBebes;}else{echo 0;}?>" min="0">
                    </div>
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-info text-white mt-3" name="buscarVuelo" value="buscando">Buscar</button>
    </form>
</div>
</div>

<script>
    function showContent() {
        element = document.getElementById("fechaVuelta");
        check = document.getElementById("idaVuelta");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>
