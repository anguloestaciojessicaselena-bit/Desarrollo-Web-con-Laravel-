@extends('layouts.public')

@section('content')
<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="display-4 fw-bold" style="color: var(--rosado-700)">Pruebas de Estilos</h1>
    <p class="lead text-muted-rosado">Demostración completa de los estilos personalizados del proyecto</p>
  </div>

  <!-- Paleta de Colores -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Paleta de Colores</h2>
    <div class="row g-3">
      <div class="col-md-2">
        <div class="card p-3 text-center">
          <div style="background-color: var(--rosado-50); height: 80px; border-radius: 8px; margin-bottom: 12px;"></div>
          <small class="fw-bold">rosado-50</small>
          <small class="text-muted">#fff6fa</small>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3 text-center">
          <div style="background-color: var(--rosado-100); height: 80px; border-radius: 8px; margin-bottom: 12px;"></div>
          <small class="fw-bold">rosado-100</small>
          <small class="text-muted">#ffeef7</small>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3 text-center">
          <div style="background-color: var(--rosado-200); height: 80px; border-radius: 8px; margin-bottom: 12px;"></div>
          <small class="fw-bold">rosado-200</small>
          <small class="text-muted">#ffdae9</small>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3 text-center">
          <div style="background-color: var(--rosado-500); height: 80px; border-radius: 8px; margin-bottom: 12px;"></div>
          <small class="fw-bold">rosado-500</small>
          <small class="text-muted">#ff6fa3</small>
        </div>
      </div>
      <div class="col-md-2">
        <div class="card p-3 text-center">
          <div style="background-color: var(--rosado-700); height: 80px; border-radius: 8px; margin-bottom: 12px;"></div>
          <small class="fw-bold">rosado-700</small>
          <small class="text-muted">#e65a8a</small>
        </div>
      </div>
    </div>
  </section>

  <!-- Tipografía -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Tipografía</h2>
    <div class="card p-4">
      <h1>Heading 1 - Inter Font Family</h1>
      <h2>Heading 2 - Inter Font Family</h2>
      <h3>Heading 3 - Inter Font Family</h3>
      <h4>Heading 4 - Inter Font Family</h4>
      <h5>Heading 5 - Inter Font Family</h5>
      <h6>Heading 6 - Inter Font Family</h6>
      <p class="lead">Lead paragraph - Texto destacado con mayor tamaño</p>
      <p>Párrafo normal - Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <small class="text-muted-rosado">Texto pequeño con color muted rosado</small>
    </div>
  </section>

  <!-- Botones -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Botones</h2>
    <div class="card p-4">
      <div class="mb-3">
        <h5>Botones Primary</h5>
        <button class="btn btn-primary me-2">Primary</button>
        <button class="btn btn-primary btn-lg me-2">Primary Large</button>
        <button class="btn btn-primary btn-sm">Primary Small</button>
      </div>
      <div class="mb-3">
        <h5>Botones Outline</h5>
        <button class="btn btn-outline-primary me-2">Outline Primary</button>
        <button class="btn btn-outline-primary btn-lg me-2">Outline Large</button>
        <button class="btn btn-outline-primary btn-sm">Outline Small</button>
      </div>
      <div class="mb-3">
        <h5>Estados</h5>
        <button class="btn btn-primary me-2" disabled>Disabled</button>
        <button class="btn btn-primary me-2">Hover me!</button>
        <p class="text-muted mt-2 mb-0"><small>Los botones tienen efectos de hover con translateY(-2px) y sombra aumentada</small></p>
      </div>
    </div>
  </section>

  <!-- Cards -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Cards</h2>
    <div class="row g-3">
      <div class="col-md-4">
        <div class="card p-4">
          <h5 class="card-title">Card con Hover</h5>
          <p class="card-text">Pasa el mouse sobre esta card para ver el efecto de elevación.</p>
          <a href="#" class="btn btn-primary">Ver más</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h5 class="card-title">Otra Card</h5>
          <p class="card-text">Las cards tienen bordes redondeados de 12px y borde rosado sutil.</p>
          <a href="#" class="btn btn-outline-primary">Explorar</a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card p-4">
          <h5 class="card-title">Tercera Card</h5>
          <p class="card-text">El efecto hover incluye translateY(-4px) y sombra dinámica.</p>
          <a href="#" class="btn btn-primary">Acción</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Hero Section -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Hero Section</h2>
    <div class="hero">
      <div class="hero-content">
        <h1>Sección Hero</h1>
        <p class="lead">Esta es una sección hero con gradiente rosado de fondo y diseño responsive.</p>
        <div class="hero-cta">
          <a href="#" class="btn btn-primary btn-lg me-2">Acción Principal</a>
          <a href="#" class="btn btn-outline-primary btn-lg">Acción Secundaria</a>
        </div>
      </div>
      <div class="hero-image">
        <div style="width: 240px; height: 240px; background: linear-gradient(135deg, var(--rosado-200), var(--rosado-500)); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
          <span style="font-size: 80px;">🎨</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Formularios -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Formularios</h2>
    <div class="card p-4">
      <form>
        <div class="mb-3">
          <label for="exampleInput1" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="exampleInput1" placeholder="Ingresa tu nombre">
          <small class="text-muted">Los inputs tienen focus con borde rosado y sombra sutil</small>
        </div>
        <div class="mb-3">
          <label for="exampleInput2" class="form-label">Email</label>
          <input type="email" class="form-control" id="exampleInput2" placeholder="correo@ejemplo.com">
        </div>
        <div class="mb-3">
          <label for="exampleSelect" class="form-label">Selección</label>
          <select class="form-select" id="exampleSelect">
            <option selected>Elige una opción</option>
            <option value="1">Opción 1</option>
            <option value="2">Opción 2</option>
            <option value="3">Opción 3</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="exampleTextarea" class="form-label">Mensaje</label>
          <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Escribe tu mensaje aquí"></textarea>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck">
          <label class="form-check-label" for="exampleCheck">Acepto términos y condiciones</label>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
  </section>

  <!-- Tablas -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Tablas</h2>
    <div class="card p-4">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Categoría</th>
            <th scope="col">Precio</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Producto A</td>
            <td>Categoría 1</td>
            <td>$99.99</td>
            <td><span class="badge badge-rosado">Activo</span></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Producto B</td>
            <td>Categoría 2</td>
            <td>$149.99</td>
            <td><span class="badge badge-rosado">Activo</span></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Producto C</td>
            <td>Categoría 1</td>
            <td>$79.99</td>
            <td><span class="badge bg-secondary">Inactivo</span></td>
          </tr>
        </tbody>
      </table>
      <p class="text-muted mb-0"><small>Los encabezados de tabla tienen fondo rosado sutil</small></p>
    </div>
  </section>

  <!-- Badges -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Badges</h2>
    <div class="card p-4">
      <h5 class="mb-3">Diferentes estilos de badges:</h5>
      <span class="badge badge-rosado me-2">Badge Rosado</span>
      <span class="badge bg-primary me-2">Primary</span>
      <span class="badge bg-secondary me-2">Secondary</span>
      <span class="badge bg-success me-2">Success</span>
      <span class="badge bg-danger me-2">Danger</span>
      <span class="badge bg-warning text-dark me-2">Warning</span>
      <span class="badge bg-info text-dark me-2">Info</span>
    </div>
  </section>

  <!-- Responsive -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Diseño Responsive</h2>
    <div class="card p-4">
      <h5>Breakpoints del tema:</h5>
      <ul>
        <li><strong>Desktop (> 992px):</strong> Hero con imagen lateral, padding completo</li>
        <li><strong>Tablet (576px - 992px):</strong> Hero con imagen más pequeña, padding reducido</li>
        <li><strong>Mobile (< 576px):</strong> Hero en columna, botones al 48% de ancho, imagen centrada</li>
      </ul>
      <p class="text-muted mb-0"><small>Redimensiona la ventana del navegador para ver los cambios responsive</small></p>
    </div>
  </section>

  <!-- Navbar Demo -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Navbar</h2>
    <div class="card p-4">
      <p>El navbar del proyecto tiene:</p>
      <ul>
        <li>Gradiente de fondo: <code>linear-gradient(90deg, var(--rosado-100), #fff)</code></li>
        <li>Sombra sutil: <code>box-shadow: 0 2px 6px rgba(0,0,0,0.04)</code></li>
        <li>Brand en color rosado-700 con peso 700</li>
        <li>Links con hover en color rosado-700</li>
      </ul>
      <p class="text-muted mb-0"><small>Mira el navbar en la parte superior de esta página</small></p>
    </div>
  </section>

  <!-- Utilidades -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Utilidades CSS</h2>
    <div class="card p-4">
      <h5>Clases de utilidad personalizadas:</h5>
      <ul>
        <li><code>.text-muted-rosado</code> - <span class="text-muted-rosado">Texto con opacidad 60%</span></li>
        <li><code>.badge-rosado</code> - <span class="badge badge-rosado">Badge con color rosado-500</span></li>
        <li><code>.hero</code> - Sección hero con gradiente y layout flex</li>
        <li><code>.hero-cta</code> - Contenedor de botones del hero</li>
        <li><code>.hero-img</code> - Imagen del hero con tamaño responsive</li>
      </ul>
    </div>
  </section>

  <!-- Variables CSS -->
  <section class="mb-5">
    <h2 class="h3 mb-4">Variables CSS</h2>
    <div class="card p-4">
      <h5>Variables disponibles en :root:</h5>
      <pre class="bg-light p-3 rounded"><code>--rosado-50: #fff6fa;
--rosado-100: #ffeef7;
--rosado-200: #ffdae9;
--rosado-500: #ff6fa3;
--rosado-700: #e65a8a;
--bs-body-bg: var(--rosado-50);
--bs-body-color: #2b2b2b;</code></pre>
    </div>
  </section>

  <div class="text-center mt-5 pt-5 border-top">
    <p class="text-muted-rosado">Página de pruebas de estilos - Proyecto Laravel</p>
    <a href="{{ url('/') }}" class="btn btn-outline-primary">Volver al inicio</a>
  </div>
</div>
@endsection
