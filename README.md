# SGE Platform - Sistema de Gestión Empresarial

> Plataforma modular construida con Laravel 12 + PostgreSQL 18

## 🚀 Características
- **Arquitectura 100% modular** - +100 módulos planeados
- **Tecnología moderna** - Laravel 12, PostgreSQL 18, Docker Sail
- **Licencia AGPLv3** - Core y módulos básicos
- **Para empresas e ISPs** - Módulos especializados en desarrollo

## 📦 Módulos Actuales
- ✅ **Blog** - Sistema de publicaciones y artículos

## 🚧 Módulos en Desarrollo
- 🔄 **Billing** - Sistema de facturación avanzado
- 🔄 **ISP Management** - Herramientas para proveedores de servicios
- 🔄 **CRM** - Gestión de relaciones con clientes

## 🛠 Instalación para Desarrollo

- Clonar repositorio
    ```bash
    git clone https://github.com/terracenter/sge-platform.git
    cd sge-platform
    ```

- Iniciar entorno con Docker Sail
    ```bash
    ./vendor/bin/sail up -d
    ```

- Ejecutar migraciones y datos de prueba
    ```bash
    ./vendor/bin/sail artisan migrate --seed
    ```

- Acceder a la aplicación
    ```
    http://localhost
    ```



