import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';

// Inicializar la aplicación Stimulus
const app = Application.start();

// Cargar automáticamente todos los controladores desde la carpeta controllers
const context = require.context('./controllers', true, /\.js$/);
app.load(definitionsFromContext(context));

// Si necesitas registrar algún controlador personalizado o de terceros, puedes hacerlo aquí
// Por ejemplo: app.register('some_controller_name', SomeImportedController);
