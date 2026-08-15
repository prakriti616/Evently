@extends('layouts.app')

@section('title', $event->title)

@section('content')

<div class="event-details-page">

    {{-- TOP BAR --}}
    <div class="details-topbar">

        <a
            href="{{ route('events.index') }}"
            class="details-back"
        >
            ←
            <span>Back to events</span>
        </a>

        <div class="details-top-actions">

            <a
                href="{{ route('events.edit', $event) }}"
                class="details-edit-button"
            >
                Edit Event
            </a>

            <form
                action="{{ route('events.destroy', $event) }}"
                method="POST"
                onsubmit="return confirm('Are you sure you want to delete this event?');"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="details-delete-button"
                >
                    Delete
                </button>

            </form>

        </div>

    </div>


    {{-- MAIN CONTENT --}}
    <div class="event-details-grid">

        {{-- LEFT COLUMN --}}
        <div class="event-main-column">

            {{-- HERO --}}
            <div class="hero-image-wrapper">

                @if($event->image)

                    <img
                        src="{{ $event->image }}"
                        alt="{{ $event->title }}"
                        class="event-hero-image"
                    >

                @else

                    <div class="event-hero-placeholder">
                        <span>✦</span>
                    </div>

                @endif

                <div class="hero-overlay"></div>

                <span class="details-status">
                    {{ ucfirst($event->status) }}
                </span>

            </div>


            {{-- TITLE SECTION --}}
            <div class="event-title-section">

                <span class="details-category">
                    {{ $event->category }}
                </span>

                <h1>
                    {{ $event->title }}
                </h1>

                <p class="details-intro">
                    {{ $event->description }}
                </p>

            </div>


            {{-- EVENT META --}}
            <div class="event-meta">

                <div class="meta-item">

                    <div class="meta-icon">
                        ◷
                    </div>

                    <div>

                        <span>
                            DATE
                        </span>

                        <strong>
                            {{ $event->event_date->format('d M Y') }}
                        </strong>

                    </div>

                </div>


                <div class="meta-item">

                    <div class="meta-icon">
                        ◷
                    </div>

                    <div>

                        <span>
                            TIME
                        </span>

                        <strong>
                            {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                        </strong>

                    </div>

                </div>


                <div class="meta-item">

                    <div class="meta-icon">
                        ⌖
                    </div>

                    <div>

                        <span>
                            LOCATION
                        </span>

                        <strong>
                            {{ $event->location }}
                        </strong>

                    </div>

                </div>


                <div class="meta-item">

                    <div class="meta-icon">
                        $
                    </div>

                    <div>

                        <span>
                            TICKET
                        </span>

                        <strong>
                            @if($event->price > 0)
                                ${{ number_format($event->price, 2) }}
                            @else
                                Free
                            @endif
                        </strong>

                    </div>

                </div>

            </div>


            {{-- DESCRIPTION --}}
            <div class="details-card event-description">

                <div class="details-card-heading">

                    <span class="heading-line"></span>

                    <h2>
                        About this event
                    </h2>

                </div>

                <div class="description-text">

                    {!! nl2br(e($event->description)) !!}

                </div>

            </div>


            {{-- EVENT INFORMATION --}}
            <div class="details-card">

                <div class="details-card-heading">

                    <span class="heading-line"></span>

                    <h2>
                        Event information
                    </h2>

                </div>


                <div class="info-list">

                    <div class="info-row">

                        <span>
                            Category
                        </span>

                        <strong>
                            {{ $event->category }}
                        </strong>

                    </div>


                    <div class="info-row">

                        <span>
                            Date
                        </span>

                        <strong>
                            {{ $event->event_date->format('l, d F Y') }}
                        </strong>

                    </div>


                    <div class="info-row">

                        <span>
                            Location
                        </span>

                        <strong>
                            {{ $event->location }}
                        </strong>

                    </div>


                    <div class="info-row">

                        <span>
                            Ticket price
                        </span>

                        <strong>

                            @if($event->price > 0)

                                ${{ number_format($event->price, 2) }}

                            @else

                                Free

                            @endif

                        </strong>

                    </div>

                </div>

            </div>

        </div>


        {{-- RIGHT COLUMN --}}
        <aside class="event-side-column">

            {{-- ACTION CARD --}}
            <div class="details-card action-card">

                <span class="side-label">
                    EVENT ACTIONS
                </span>

                <h3>
                    Manage this event
                </h3>

                <p>
                    Keep your event details up to date.
                </p>

                <a
                    href="{{ route('events.edit', $event) }}"
                    class="side-edit-button"
                >
                    Edit Event
                </a>

            </div>


            {{-- DATE CARD --}}
            <div class="details-card date-card">

                <span class="side-label">
                    EVENT DATE
                </span>

                <div class="large-date">

                    <strong>
                        {{ $event->event_date->format('d') }}
                    </strong>

                    <div>

                        <span>
                            {{ $event->event_date->format('M') }}
                        </span>

                        <small>
                            {{ $event->event_date->format('Y') }}
                        </small>

                    </div>

                </div>

            </div>


            {{-- LOCATION CARD --}}
            <div class="details-card location-card">

                <span class="side-label">
                    LOCATION
                </span>

                <div class="location-content">

                    <div class="location-icon">
                        ⌖
                    </div>

                    <div>

                        <strong>
                            {{ $event->location }}
                        </strong>

                        <span>
                            Event venue
                        </span>

                    </div>

                </div>

            </div>


            {{-- PRICE CARD --}}
            <div class="details-card price-card">

                <span class="side-label">
                    TICKET PRICE
                </span>

                <strong class="detail-price">

                    @if($event->price > 0)

                        ${{ number_format($event->price, 2) }}

                    @else

                        Free

                    @endif

                </strong>

                <span>
                    per person
                </span>

            </div>

        </aside>

    </div>

</div>

@endsection