@if($timerIsRunning())
    <span
        x-data="
    {
        timer: {
            days: '{{ $days() }}',
            hours: '{{ $hours() }}',
            minutes: '{{ $minutes() }}',
            seconds: '{{ $seconds() }}',
        },
        startCounter: function () {
            let runningCounter = setInterval(() => {
                let countDownDate = new Date({{ $endsAt->timestamp }} * 1000).getTime();
                let timeDistance = countDownDate - new Date().getTime();
                if (timeDistance < 0) {
                    clearInterval(runningCounter);
                    return;
                }
                this.timer.days = this.formatCounter(Math.floor(timeDistance / (1000 * 60 * 60 * 24)));
                this.timer.hours = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                this.timer.minutes = this.formatCounter(Math.floor((timeDistance % (1000 * 60 * 60)) / (1000 * 60)));
                this.timer.seconds = this.formatCounter(Math.floor((timeDistance % (1000 * 60)) / 1000));
            }, 1000);
        },
        formatCounter: function (number) {
            return number.toString().padStart(2, '0');
        },
        timerIsRunning: function () {
            return this.timer.days != 0 || this.timer.hours != 0 || this.timer.minutes != 0 || this.timer.seconds != 0;
        }
    }
    "
        x-init="startCounter()"
        {{ $attributes }}
    >
        <span class="flex gap-2" x-show="timerIsRunning">
            @if ($slot->isEmpty())
                <div class="flex flex-col w-12">
                     <span
                        class="days-block p-1 rounded font-bold"
                        x-text="timer.days">{{ $days() }}</span>
                    <span class="text-xs">Days</span>
                </div>

                <div class="flex flex-col w-12">
                    <span
                        class="months-block p-1 rounded font-bold"
                        x-text="timer.hours">{{ $hours() }}</span>
                    <span class="text-xs">Hours</span>
                </div>

                <div class="flex flex-col w-12">
                    <span
                        class="minutes-block p-1 rounded font-bold"
                        x-text="timer.minutes">{{ $minutes() }}</span>
                     <span class="text-xs">Mins</span>
                </div>

                <div class="flex flex-col w-12">
                    <span
                        class=" seconds-block p-1 rounded font-bold"
                        x-text="timer.seconds">{{ $seconds() }}</span>
                    <span class="text-xs">Secs</span>
                </div>
            @else
                {{ $slot }}
            @endif
        </span>
    </span>
@endif
