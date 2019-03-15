@extends('layouts.app')

@section('title', 'Android Apps')

@section('html')
<div id="page-android-apps-index" class="page-content page-content-android-apps">
    <div class="mdc-layout-grid page-content-item">
        {{-- Controls --}}
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-1">
                @button([
                    'classes' => 'mdc-button mdc-button--outlined',
                    'onClick' => 'window.history.back()'
                ])
                    Back
                @endbutton
            </div>

            {{-- Divider --}}
            <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-9-desktop mdc-layout-grid__cell--span-5-tablet
            mdc-layout-grid__cell--span-1-phone"></div>

            @if(Auth::user() && !Auth::user()->hasRole('user'))
                <div class="mdc-layout-grid__cell mdc-layout-grid__cell--span-2">
                    @button([
                        'id' => 'android-app-create',
                        'classes' => 'mdc-button mdc-button--outlined'
                    ])
                        Create New
                    @endbutton
                </div>
            @endif
        </div>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <h1 class="page-title mdc-typography--headline4 text-center">All Android Apps</h1>
    </div>

    <div class="mdc-layout-grid page-content-item">
        <div class="mdc-layout-grid__inner">
            @foreach ($androidApps as $androidApp)
                @component('resources.android_apps.partials.card', [
                    'androidApp' => $androidApp
                ])
                @endcomponent
            @endforeach
        </div>
    </div>
</div>

{{ $androidApps->links() }}

@endsection
