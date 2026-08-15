@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard-topbar">

        <div>

            <p class="eyebrow">
                YOUR WORKSPACE
            </p>

            <h1>
                Good afternoon, Prakriti <span>✦</span>
            </h1>

            <p class="dashboard-subtitle">
                Here's what's happening with your events.
            </p>

        </div>


        <a
            href="{{ route('events.create') }}"
            class="create-event-button"
        >
            <span>＋</span>
            Create Event
        </a>

    </div>


    @if(session('success'))

        <div class="success-alert">

            <span class="success-check">
                ✓
            </span>

            {{ session('success') }}

        </div>

    @endif


    {{-- STATISTICS --}}

    <div class="statistics-grid">

        <div class="stat-card">

            <div class="stat-icon purple">
                ▣
            </div>

            <div>

                <span class="stat-label">
                    Total Events
                </span>

                <strong class="stat-value">
                    {{ $events->count() }}
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon green">
                ◷
            </div>

            <div>

                <span class="stat-label">
                    Upcoming
                </span>

                <strong class="stat-value">
                    {{ $events->where('status', 'upcoming')->count() }}
                </strong>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon peach">
                ✓
            </div>

            <div>

                <span class="stat-label">
                    Completed
                </span>

                <strong class="stat-value">
                    {{ $events->where('status', 'completed')->count() }}
                </strong>

            </div>

        </div>

    </div>


    {{-- EVENTS SECTION --}}

    <section class="events-section">

        <div class="section-header">

            <div>

                <h2>
                    Upcoming Events
                </h2>

                <p>
                    Your next moments worth remembering.
                </p>

            </div>


            @if($events->count())

                <a
                    href="{{ route('events.index') }}"
                    class="view-all"
                >
                    View all
                    <span>→</span>
                </a>

            @endif

        </div>


        @if($events->count())

            <div class="dashboard-events-grid">

                @foreach($events->sortBy('event_date')->take(4) as $event)

                    <div class="dashboard-event-card">

                        {{-- EVENT CARD LINK --}}

                        <a
                            href="{{ route('events.show', $event) }}"
                            class="dashboard-event-main-link"
                        >

                            <div class="dashboard-event-visual">

                                @if($event->image)

                                    <img
                                        src="{{ $event->image }}"
                                        alt="{{ $event->title }}"
                                    >

                                @else

                                    <div class="dashboard-event-placeholder">

                                        <span>✦</span>

                                    </div>

                                @endif


                                <span class="dashboard-status">
                                    {{ ucfirst($event->status) }}
                                </span>

                            </div>


                            <div class="dashboard-event-body">

                                <span class="dashboard-category">
                                    {{ $event->category }}
                                </span>

                                <h3>
                                    {{ $event->title }}
                                </h3>

                                <div class="dashboard-event-meta">

                                    <span>
                                        ◷
                                        {{ $event->event_date->format('d M Y') }}
                                    </span>

                                    <span>
                                        ⌖
                                        {{ $event->location }}
                                    </span>

                                </div>

                            </div>

                        </a>


                        {{-- EDIT ACTION --}}

                        <div class="dashboard-event-actions">

    <a
        href="{{ route('events.edit', $event) }}"
        class="event-edit-button"
    >
        Edit
    </a>


    <form
        action="{{ route('events.destroy', $event) }}"
        method="POST"
        class="event-delete-form"
        onsubmit="return confirm('Are you sure you want to delete this event?');"
    >

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="event-delete-button"
        >
            Delete
        </button>

    </form>

</div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="dashboard-empty">

                <div class="dashboard-empty-icon">
                    ✦
                </div>

                <h3>
                    Nothing planned yet
                </h3>

                <p>
                    Your upcoming events will appear here.
                    Start by creating your first one.
                </p>

                <a
                    href="{{ route('events.create') }}"
                    class="create-event-button"
                >
                    <span>＋</span>
                    Create your first event
                </a>

            </div>

        @endif

    </section>

@endsection