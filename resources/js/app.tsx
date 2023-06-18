import './bootstrap';
import React from 'react';
import { createInertiaApp } from '@inertiajs/inertia-react'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client'
import '../css/app.css'
//import 'daisyui/dist/full.css'
import route from '../../vendor/tightenco/ziggy/dist/index.m';
import { store } from './store';
import { Provider } from 'react-redux';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.tsx`, import.meta.glob('./Pages/**/*.tsx')),
    setup({ el, App, props }) {
        const root = createRoot(el);
        window.route = (name, params, absolute) =>
        route(name, params, absolute, {
            ...(props.initialPage.props.ziggy as {}),
            location: new URL(props.initialPage.props.ziggy.location),
        });
        root.render(
            <Provider store={store}>
                <App {...props} />
            </Provider>
        );
    },
});
