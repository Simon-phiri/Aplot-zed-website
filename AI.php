<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <style>
        body { 
            background-image: url('https://images.pexels.com/photos/8566524/pexels-photo-8566524.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1'); 
            font-family: Arial, sans-serif;
        }
        .chat-container {
            width: 400px;
            margin: 50px auto;
            margin-right: 70px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #fff;
        }
        .chat-header {
            background-color: darkblue;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .chat-window {
            height: 400px;
            overflow-y: auto;
            padding: 20px;
            background-color: #f1f1f1;
        }
        .chat-message {
            margin: 10px 0;
        }
        .user-message {
            text-align: right;
        }
        .bot-message {
            text-align: left;
        }
        .chat-input {
            display: flex;
            border-top: 1px solid #ddd;
        }
        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
            border-top: 1px solid #ddd;
        }
        .chat-input button {
            padding: 10px;
            background-color: darkblue;
            color: white;
            border: none;
            cursor: pointer;
        }
        .chat-input button:hover {
            background-color: #000080;
        }
        .loading {
            display: inline-block;
            animation: blink 1.4s infinite both;
        }
        @keyframes blink {
            0%, 20%, 50%, 80%, 100% {
                color: transparent;
            }
            40% {
                color: black;
            }
            60% {
                color: black;
            }
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">Chatbot</div>
        <div class="chat-window" id="chatWindow"></div>
        <div class="chat-input">
            <input type="text" id="userInput" placeholder="Type your message here...">
            <button id="sendButton">Send</button>
        </div>
        <div id="suggestedQuestions">
            <p>Choose a question to start:</p>
            <ul>
                <li class="suggested-question">Flights from South Africa to Zambia</li>
                <li class="suggested-question">Places to visit in Zambia</li>
                <li class="suggested-question">Local language in Zambia</li>
                <li class="suggested-question">Speak in Chinyanja</li>
                <li class="suggested-question">Flights from Cape Town to Livingstone</li>
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#sendButton').on('click', sendMessage);
            $('#userInput').on('keypress', function(e) {
                if (e.which === 13) {
                    sendMessage();
                }
            });

            $('.suggested-question').on('click', function() {
                const question = $(this).text();
                $('#userInput').val(question);
                sendMessage();
            });

            function sendMessage() {
                const userInput = $('#userInput').val();
                if (userInput.trim() === '') return;

                appendMessage(userInput, 'user-message');
                $('#userInput').val('');

                // Show loading dots
                appendMessage('<span class="loading">...</span>', 'bot-message');

                // Simulate a delay for the AI response
                setTimeout(function() {
                    $('.loading').remove(); // Remove loading dots
                    const aiResponse = generateAIResponse(userInput);
                    appendMessage(aiResponse, 'bot-message');
                }, 2000); // 2 seconds delay
            }

            function appendMessage(message, className) {
                const chatWindow = $('#chatWindow');
                const messageElement = $('<div>').addClass('chat-message ' + className).html(message);
                chatWindow.append(messageElement);
                chatWindow.scrollTop(chatWindow.prop('scrollHeight'));
            }

            function generateAIResponse(query) {
                query = query.toLowerCase().trim();

                // Enhanced greeting detection
                const greetingPattern = /\b(hello|hi|hey|greetings|good morning|good afternoon|good evening)\b/;
                if (greetingPattern.test(query)) {
                    return "Hello! How can I assist you today?";
                }

                // Handling flight queries
                if (query.includes('flights from') || query.includes('flight from')) {
                    const cities = query.match(/from\s+(.+?)\s+to\s+(.+)/);
                    if (cities) {
                        const fromCity = cities[1].trim();
                        const toCity = cities[2].trim();
                        const flights = mockFlights.filter(flight => flight.from.toLowerCase() === fromCity && flight.to.toLowerCase() === toCity);

                        if (flights.length > 0) {
                            return `I found the following flights from ${fromCity} to ${toCity}:
                                ${flights.map(flight => `Flight: ${flight.flightOptions.join(', ')}, Price: ${flight.price}, Departure: ${flight.departure}, Return: ${flight.return}`).join('<br>')}`;
                        } else {
                            return `Sorry, I couldn't find any flights from ${fromCity} to ${toCity}. Try another city or check back later!`;
                        }
                    } else {
                        return "Please specify both the departure and destination cities in the format: 'from [city] to [city]'.";
                    }
                }

                // Handling query for places to visit in Zambia
                if (query.includes('places to visit in zambia') || query.includes('best destinations in zambia')) {
                    return `Zambia offers a wealth of amazing destinations:
                        - Victoria Falls: One of the Seven Natural Wonders of the World.
                        - South Luangwa National Park: Known for its walking safaris.
                        - Lower Zambezi National Park: Great for canoeing and wildlife viewing.
                        - Kafue National Park: One of Africa's largest parks.
                        - Livingstone: A historic town and gateway to Victoria Falls.`;
                }

                // Handling query for local language in Zambia
                if (query.includes('local language in zambia')) {
                    return `The official language of Zambia is English. However, there are many local languages spoken, with Bemba, Nyanja (Chinyanja), Tonga, and Lozi being some of the most common ones.`;
                }

                // Handling request to speak in Chinyanja
                if (query.includes('speak in chinyanja') || query.includes('say something in chinyanja')) {
                    return `Muli bwanji? Ndili bwino, zikomo. (How are you? I am fine, thank you.)`;
                }

                // Default response for unrecognized input
                return "I'm sorry, I didn't quite understand that. Could you please rephrase your question?";
            }

            // Example mock data for flights
            const mockFlights = [
                {
                    from: 'cape town',
                    to: 'livingstone',
                    flightOptions: ['SAA123', 'BA456'],
                    price: '$500',
                    departure: '2024-11-20',
                    return: '2024-11-27'
                },
                {
                    from: 'johannesburg',
                    to: 'lusaka',
                    flightOptions: ['SAA789', 'KA012'],
                    price: '$450',
                    departure: '2024-11-21',
                    return: '2024-11-28'
                }
            ];
        });
    </script>
</body>
</html>
