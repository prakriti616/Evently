@extends('layouts.app')

@section('title', 'Create Event')

@section('content')

<div class="create-event-page">

    {{-- Header --}}
    <div class="page-header">

        <div>

            <div class="breadcrumb">
                Dashboard
                <span>/</span>
                Events
                <span>/</span>
                Create Event
            </div>

            <div class="page-title-row">

                <a
                    href="{{ route('events.index') }}"
                    class="back-button"
                >
                    ←
                </a>

                <h1>Create Event</h1>

            </div>

        </div>


        <div class="header-actions">

            <button
                type="button"
                class="round-action"
            >
                ♧
            </button>

            <button
                type="button"
                class="round-action"
            >
                ⚙
            </button>

            <div class="profile">

                <div class="profile-avatar">
                    PL
                </div>

                <div>
                    <strong>
                        Prakriti
                    </strong>

                    <small>
                        Admin
                    </small>
                </div>

            </div>

        </div>

    </div>


    {{-- Create Form --}}
    <form
        action="{{ route('events.store') }}"
        method="POST"
        class="create-event-form"
    >

        @csrf


        {{-- Event Information --}}
        <section class="form-card">

            <div class="form-card-heading">

                <div>

                    <h2>
                        Event Information
                    </h2>

                    <p>
                        Add the details of your new event.
                    </p>

                </div>

            </div>


            <div class="form-grid">


                {{-- Event Name --}}
                <div class="form-group full-width">

                    <label for="title">
                        Event Name
                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter event name"
                        required
                    >

                    @error('title')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Category --}}
                <div class="form-group">

                    <label for="category">
                        Category
                    </label>

                    <select
                        id="category"
                        name="category"
                        required
                    >

                        <option value="">
                            Select category
                        </option>

                        <option
                            value="Music"
                            {{ old('category') === 'Music' ? 'selected' : '' }}
                        >
                            Music
                        </option>

                        <option
                            value="Outdoor & Adventure"
                            {{ old('category') === 'Outdoor & Adventure' ? 'selected' : '' }}
                        >
                            Outdoor & Adventure
                        </option>

                        <option
                            value="Fashion"
                            {{ old('category') === 'Fashion' ? 'selected' : '' }}
                        >
                            Fashion
                        </option>

                        <option
                            value="Health & Wellness"
                            {{ old('category') === 'Health & Wellness' ? 'selected' : '' }}
                        >
                            Health & Wellness
                        </option>

                        <option
                            value="Art & Design"
                            {{ old('category') === 'Art & Design' ? 'selected' : '' }}
                        >
                            Art & Design
                        </option>

                        <option
                            value="Food & Culinary"
                            {{ old('category') === 'Food & Culinary' ? 'selected' : '' }}
                        >
                            Food & Culinary
                        </option>

                        <option
                            value="Technology"
                            {{ old('category') === 'Technology' ? 'selected' : '' }}
                        >
                            Technology
                        </option>

                    </select>

                    @error('category')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Location --}}
                <div class="form-group">

                    <label for="location">
                        Location
                    </label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ old('location') }}"
                        placeholder="Enter venue or location"
                        required
                    >

                    @error('location')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Date --}}
                <div class="form-group">

                    <label for="event_date">
                        Event Date
                    </label>

                    <input
                        type="date"
                        id="event_date"
                        name="event_date"
                        value="{{ old('event_date') }}"
                        required
                    >

                    @error('event_date')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Time --}}
                <div class="form-group">

                    <label for="event_time">
                        Event Time
                    </label>

                    <input
                        type="time"
                        id="event_time"
                        name="event_time"
                        value="{{ old('event_time') }}"
                        required
                    >

                    @error('event_time')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Price --}}
                <div class="form-group">

                    <label for="price">Price</label>

<div class="price-input">
    <span>₹</span>
    <input
        type="number"
        id="price"
        name="price"
        min="0"
        step="1"
        placeholder="600"
        value="{{ old('price') }}"
    >
</div>

                    @error('price')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Image --}}
                <div class="form-group full-width">

                    <label for="image">
                        Event Image URL
                    </label>

                    <input
                        type="text"
                        id="image"
                        name="image"
                        value="{{ old('image') }}"
                        placeholder="https://example.com/event-image.jpg"
                    >

                    <small class="field-help">
                        Paste an image URL for the event card.
                    </small>

                    @error('image')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


                {{-- Description --}}
                <div class="form-group full-width">

                    <label for="description">
                        About Event
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Describe your event..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <span class="form-error">
                            {{ $message }}
                        </span>
                    @enderror

                </div>


            </div>

        </section>


        {{-- Preview --}}
        <section class="form-card preview-section">

            <div class="form-card-heading">

                <div>

                    <h2>
                        Event Preview
                    </h2>

                    <p>
                        Your event card will appear like this.
                    </p>

                </div>

            </div>


            <div class="event-preview">

                <div class="preview-image">
                    EVENT PREVIEW
                </div>

                <div class="preview-content">

                    <span class="preview-category">
                        CATEGORY
                    </span>

                    <h3>
                        Your Event
                    </h3>

                    <p>
                        Event location
                    </p>

                </div>

            </div>

        </section>


        {{-- Actions --}}
        <div class="form-actions">

            <a
                href="{{ route('events.index') }}"
                class="cancel-button"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="create-button"
            >
                Create Event
            </button>

        </div>

    </form>

</div>

@endsection