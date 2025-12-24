# Guía de Estilos del Proyecto

Esta documentación describe los estilos personalizados implementados en el proyecto Laravel.

## Paleta de Colores

El proyecto utiliza una paleta de colores rosados personalizada definida en variables CSS:

| Variable | Valor HEX | Uso |
|----------|-----------|-----|
| `--rosado-50` | `#fff6fa` | Fondo del body, tonos muy claros |
| `--rosado-100` | `#ffeef7` | Fondos de navbar, gradientes suaves |
| `--rosado-200` | `#ffdae9` | Acentos, gradientes |
| `--rosado-500` | `#ff6fa3` | Color principal, botones, badges |
| `--rosado-700` | `#e65a8a` | Títulos, hover states, brand |

### Variables Globales

```css
--bs-body-bg: var(--rosado-50);
--bs-body-color: #2b2b2b;
```

## Tipografía

**Familia de fuente:** Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial

- Fuente moderna y legible
- Optimizada para interfaces web
- Fallbacks a fuentes del sistema

## Componentes Personalizados

### Navbar

```css
background: linear-gradient(90deg, var(--rosado-100), #fff);
box-shadow: 0 2px 6px rgba(0,0,0,0.04);
```

- **Brand:** Color rosado-700, font-weight 700
- **Links:** Color gris con hover en rosado-700
- Gradiente horizontal de rosado a blanco

### Botones

#### `.btn-primary`
- Background: `var(--rosado-500)`
- Sombra: `0 6px 18px rgba(255,111,163,0.08)`
- **Hover:** `translateY(-2px)` con sombra aumentada
- Transición suave de 120ms

#### `.btn-outline-primary`
- Borde y texto en `var(--rosado-500)`
- Fondo transparente

### Cards

```css
border: 1px solid rgba(255,111,163,0.12);
border-radius: 12px;
transition: transform .12s ease, box-shadow .12s ease;
```

**Efecto Hover:**
- `transform: translateY(-4px)`
- `box-shadow: 0 12px 30px rgba(0,0,0,0.06)`

### Hero Section

Componente destacado para páginas de inicio:

```css
background: linear-gradient(135deg, rgba(255,111,163,0.08), rgba(255,234,244,0.18));
border-radius: 12px;
padding: 40px;
display: flex;
gap: 24px;
align-items: center;
```

**Estructura:**
- `.hero` - Contenedor principal
- `.hero-content` - Contenido de texto (flex: 1)
- `.hero-cta` - Botones de llamada a la acción
- `.hero-img` - Imagen lateral (240px en desktop)

### Formularios

#### `.form-control:focus`
```css
box-shadow: 0 0 0 .15rem rgba(255,111,163,0.12);
border-color: var(--rosado-500);
```

#### `.form-label`
- `font-weight: 600` para mejor legibilidad

### Tablas

```css
thead th {
  background-color: rgba(255,111,163,0.04);
  border-bottom: none;
}
```

- Encabezados con fondo rosado sutil
- Celdas con alineación vertical centrada

### Badges

#### `.badge-rosado`
```css
background-color: var(--rosado-500);
color: #fff;
```

## Clases de Utilidad

| Clase | Descripción |
|-------|-------------|
| `.text-muted-rosado` | Texto con opacidad 60% |
| `.badge-rosado` | Badge con color rosado-500 |

## Diseño Responsive

### Breakpoints

#### Desktop (> 992px)
- Hero con layout horizontal
- Padding completo: 40px
- Imagen: 240px

#### Tablet (576px - 992px)
```css
.hero {
  padding: 28px;
  gap: 16px;
}
.hero-img {
  width: 180px;
}
.hero h1 {
  font-size: 1.6rem;
}
```

#### Mobile (< 576px)
```css
.hero {
  flex-direction: column;
  align-items: flex-start;
  padding: 18px;
}
.hero .hero-cta .btn {
  width: 48%;
}
.hero-img {
  width: 160px;
  margin: 12px auto 0;
  display: block;
}
```

## Accesibilidad

```css
a {
  outline-color: rgba(198, 57, 126, 0.25);
}
```

- Outline visible para navegación por teclado
- Color coordinado con el tema

## Uso de los Estilos

### Ejemplo: Crear una Card con Hover

```html
<div class="card p-4">
  <h5>Título de la Card</h5>
  <p>Contenido de la card</p>
  <a href="#" class="btn btn-primary">Acción</a>
</div>
```

### Ejemplo: Hero Section

```html
<div class="hero">
  <div class="hero-content">
    <h1>Título Principal</h1>
    <p class="lead">Descripción</p>
    <div class="hero-cta">
      <a href="#" class="btn btn-primary btn-lg">CTA Principal</a>
      <a href="#" class="btn btn-outline-primary btn-lg">CTA Secundario</a>
    </div>
  </div>
  <div class="hero-image">
    <img src="imagen.svg" alt="Hero" class="hero-img">
  </div>
</div>
```

### Ejemplo: Formulario con Estilos

```html
<form>
  <div class="mb-3">
    <label for="input1" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="input1">
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
```

## Página de Pruebas

Para ver todos los estilos en acción, visita:
```
http://localhost:8000/style-tests
```

Esta página incluye ejemplos de todos los componentes y estilos personalizados del proyecto.

## Archivo de Estilos

Ubicación: [`resources/css/theme.css`](file:///c:/laragon/www/tarea/resources/css/theme.css)

El archivo se compila y se incluye automáticamente en el layout principal de la aplicación.
