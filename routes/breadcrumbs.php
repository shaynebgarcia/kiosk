<?php

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('kiosk', function ($trail) {
    $trail->push('POS', route('kiosk.index'));
});

