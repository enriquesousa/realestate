@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


{{-- Contenido del profile form html --}}
<div class="page-content">

    <div class="row">

        {{-- Primer Tabla a la Izquierda --}}
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Detalles Propiedad</h6>
                    <div class="table-responsive">
                        <table class="table table-striped">

                            <tbody>

                                <tr>
                                    <td>Nombre</td>
                                    <td><code>{{ $property->property_name }}</code></td>
                                </tr>

                                <tr>
                                    <td>Estatus</td>
                                    <td><code>{{ $property->property_status }}</code></td>
                                </tr>

                                <tr>
                                    <td>Estatus</td>
                                    <td><code>{{ $property->property_status }}</code></td>
                                </tr>

                                <tr>
                                    <td>Precio mas Bajo</td>
                                    <td><code>{{ $property->lowest_price }}</code></td>
                                </tr>

                                <tr>
                                    <td>Precio mas Alto</td>
                                    <td><code>{{ $property->max_price }}</code></td>
                                </tr>

                                <tr>
                                    <td>Dormitorios</td>
                                    <td><code>{{ $property->bedrooms }}</code></td>
                                </tr>

                                <tr>
                                    <td>Baños</td>
                                    <td><code>{{ $property->bathrooms }}</code></td>
                                </tr>

                                <tr>
                                    <td>Cochera</td>
                                    <td><code>{{ $property->garage }}</code></td>
                                </tr>

                                <tr>
                                    <td>Tamaño de Cochera</td>
                                    <td><code>{{ $property->garage_size }}</code></td>
                                </tr>

                                <tr>
                                    <td>Dirección</td>
                                    <td><code>{{ $property->address }}</code></td>
                                </tr>

                                <tr>
                                    <td>Ciudad</td>
                                    <td><code>{{ $property->city }}</code></td>
                                </tr>

                                <tr>
                                    <td>Estado</td>
                                    <td><code>{{ $property['r_estado']['state_name'] }}</code></td>
                                </tr>

                                <tr>
                                    <td>Código Postal</td>
                                    <td><code>{{ $property->postal_code }}</code></td>
                                </tr>

                                <tr>
                                    <td>Imagen Principal</td>
                                    <td>
                                        <img src="{{ asset($property->property_thambnail) }}" style="width: 100px; height: 70px;">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Estatus</td>
                                    <td>
                                        @if ($property->status == 1)
                                            <span class="badge rounded-pill bg-success">Activa</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">Inactiva</span>
                                        @endif
                                    </td>
                                </tr>



                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Segunda Tabla a la Derecha --}}
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>

                                <tr>
                                    <td>Código</td>
                                    <td><code>{{ $property->property_code }}</code></td>
                                </tr>

                                <tr>
                                    <td>Tamaño</td>
                                    <td><code>{{ $property->property_size }}</code></td>
                                </tr>

                                <tr>
                                    <td>Video</td>
                                    <td><code>{{ $property->property_video }}</code></td>
                                </tr>

                                <tr>
                                    <td>Vecindario</td>
                                    <td><code>{{ $property->neighborhood }}</code></td>
                                </tr>

                                <tr>
                                    <td>Latitud</td>
                                    <td><code>{{ $property->latitude }}</code></td>
                                </tr>

                                <tr>
                                    <td>Longitud</td>
                                    <td><code>{{ $property->longitude }}</code></td>
                                </tr>

                                <tr>
                                    <td>Tipo</td>
                                    <td><code>{{ $property['type']['type_name'] }}</code></td>
                                </tr>

                                <tr>
                                    <td>Comodidades</td>
                                    <td>
                                        <select name="amenities_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($amenities as $ameni)
                                                <option value="{{ $ameni->amenities_name }}" {{ (in_array($ameni->amenities_name, $property_ami)) ? 'selected' : '' }}>{{ $ameni->amenities_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Agente</td>
                                    @if ($property->agent_id == NULL)
                                        <td><code> Admin </code></td>
                                    @else
                                        <td><code>{{ $property['user']['name'] }}</code></td>
                                    @endif
                                </tr>

                                {{-- <tr>
                                    <td>Descripción Corta</td>
                                    <td><code>{{ $property->short_descp }}</code></td>
                                </tr> --}}

                            </tbody>
                        </table>

                        <br><br>
                        {{-- Desplegar forma  para  cambiar estado de del 'status' --}}
                        @if ($property->status == 1)
                            <form method="POST" action="{{ route('inactive.property') }}">
                            @csrf
                                <input type="hidden" name="id" value="{{ $property->id }}">
                                <button type="submit" class="btn btn-primary">Desactivar</button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('active.property') }}">
                            @csrf
                                <input type="hidden" name="id" value="{{ $property->id }}">
                                <button type="submit" class="btn btn-primary">Activar</button>
                            </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>


@endsection
