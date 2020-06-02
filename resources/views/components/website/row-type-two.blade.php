<div class="row-type-two">
    <div class="row-top">
        <div class="container d-flex justify-content-center">
            {{--Title--}}
            <h2 class="row-title my-3 p-2 filled rotated">{{$title}}</h2>
        </div>
    </div>
    
    <div class="row-middle">
        <div class="container d-flex flex-column align-items-center justify-content-between">
            @if(sizeof($cardsData) > 0)
                
                @foreach($cardsData as $card)
                    <x-website.event-card
                        :title="$card['title']"
                        :startDate="$card['start_date']"
                        :endDate="$card['end_date']"
                        :image="$card['image']",
                        :shortDescription="$card['short_description']"
                    />
                @endforeach
            
            @else
                
                <h4>No data for {{$title}}</h4>
            
            @endif
        </div>
    </div>
</div>