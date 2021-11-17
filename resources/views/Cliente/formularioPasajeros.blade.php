<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<form action="{{ Route('cliente.process_payment') }}" method="POST">
    @csrf
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <input type="text" name="cardNumber" id="form-checkout__cardNumber" placeholder="cardNumber" />
    <input type="text" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth"
        placeholder="Expiration Month" />
    <input type="text" name="cardExpirationYear" id="form-checkout__cardExpirationYear" placeholder="Expiration Year" />
    <input type="text" name="cardholderName" id="form-checkout__cardholderName" placeholder="card holder Name" />
    <input type="email" name="cardholderEmail" id="form-checkout__cardholderEmail" placeholder="card holder Email" />
    <input type="text" name="securityCode" id="form-checkout__securityCode" placeholder="security Code" />
    <select name="issuer" id="form-checkout__issuer"></select>
    <select name="identificationType" id="form-checkout__identificationType"></select>
    <input type="text" name="identificationNumber" id="form-checkout__identificationNumber"
        placeholder="identification Number" />
    <select name="installments" id="form-checkout__installments"></select>
    <progress value="0" class="progress-bar">Cargando...</progress>
    <button class="btn btn-primary py-3 px-4" id="checkout-button">Proceed to Checkout</button>

    <script src="https://sdk.mercadopago.com/js/v2"></script>

    <script type="text/javascript">
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");
        const token = document.querySelector('input[name=_token]').value;
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function() {
            // Create a new Checkout Session using the server-side endpoint you
            // created in step 3.
            const cardForm = mp.cardForm({
                amount: "100.5",
                autoMount: true,
                form: {
                    id: "form-checkout",
                    cardholderName: {
                        id: "form-checkout__cardholderName",
                        placeholder: "Titular de la tarjeta",
                    },
                    cardholderEmail: {
                        id: "form-checkout__cardholderEmail",
                        placeholder: "E-mail",
                    },
                    cardNumber: {
                        id: "form-checkout__cardNumber",
                        placeholder: "Número de la tarjeta",
                    },
                    cardExpirationMonth: {
                        id: "form-checkout__cardExpirationMonth",
                        placeholder: "Mes de vencimiento",
                    },
                    cardExpirationYear: {
                        id: "form-checkout__cardExpirationYear",
                        placeholder: "Año de vencimiento",
                    },
                    securityCode: {
                        id: "form-checkout__securityCode",
                        placeholder: "Código de seguridad",
                    },
                    installments: {
                        id: "form-checkout__installments",
                        placeholder: "Cuotas",
                    },
                    identificationType: {
                        id: "form-checkout__identificationType",
                        placeholder: "Tipo de documento",
                    },
                    identificationNumber: {
                        id: "form-checkout__identificationNumber",
                        placeholder: "Número de documento",
                    },
                    issuer: {
                        id: "form-checkout__issuer",
                        placeholder: "Banco emisor",
                    },
                },
                callbacks: {
                    onFormMounted: error => {
                        if (error) return console.warn("Form Mounted handling error: ", error);
                        console.log("Form mounted");
                    },
                    onSubmit: event => {
                        event.preventDefault();

                        const {
                            paymentMethodId: payment_method_id,
                            issuerId: issuer_id,
                            cardholderEmail: email,
                            amount,
                            token,
                            installments,
                            identificationNumber,
                            identificationType,
                        } = cardForm.getCardFormData();

                        fetch("{{ url('process_payment') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'url': '/process_payment',
                                    "X-CSRF-Token": document.querySelector('input[name=_token]')
                                        .value
                                },
                                body: JSON.stringify({
                                    token,
                                    issuer_id,
                                    payment_method_id,
                                    transaction_amount: Number(amount),
                                    installments: Number(installments),
                                    description: "Descripción del producto",
                                    payer: {
                                        email,
                                        identification: {
                                            type: identificationType,
                                            number: identificationNumber,
                                        },
                                    },
                                }),
                            })
                            // then
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(session) {
                                return stripe.redirectToCheckout({
                                    sessionId: session.id
                                });
                            })
                            .then(function(result) {
                                // If `redirectToCheckout` fails due to a browser or network
                                // error, you should display the localized error message to your
                                // customer using `error.message`.
                                if (result.error) {
                                    alert(result.error.message);
                                }
                            })
                            .catch(function(error) {
                                //console.error('Error:', error);
                            });
                    }
                },
            });
        });
    </script>
</form>

<script>
    // const token = '{{ csrf_token() }}';
    // const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");
    // // Step #3

    const cardForm = mp.cardForm({
        amount: "100.5",
        autoMount: true,
        form: {
            id: "form-checkout",
            cardholderName: {
                id: "form-checkout__cardholderName",
                placeholder: "Titular de la tarjeta",
            },
            cardholderEmail: {
                id: "form-checkout__cardholderEmail",
                placeholder: "E-mail",
            },
            cardNumber: {
                id: "form-checkout__cardNumber",
                placeholder: "Número de la tarjeta",
            },
            cardExpirationMonth: {
                id: "form-checkout__cardExpirationMonth",
                placeholder: "Mes de vencimiento",
            },
            cardExpirationYear: {
                id: "form-checkout__cardExpirationYear",
                placeholder: "Año de vencimiento",
            },
            securityCode: {
                id: "form-checkout__securityCode",
                placeholder: "Código de seguridad",
            },
            installments: {
                id: "form-checkout__installments",
                placeholder: "Cuotas",
            },
            identificationType: {
                id: "form-checkout__identificationType",
                placeholder: "Tipo de documento",
            },
            identificationNumber: {
                id: "form-checkout__identificationNumber",
                placeholder: "Número de documento",
            },
            issuer: {
                id: "form-checkout__issuer",
                placeholder: "Banco emisor",
            },
        },
        callbacks: {
            onFormMounted: error => {
                if (error) return console.warn("Form Mounted handling error: ", error);
                console.log("Form mounted");
            },
            onSubmit: event => {
                event.preventDefault();

                const {
                    paymentMethodId: payment_method_id,
                    issuerId: issuer_id,
                    cardholderEmail: email,
                    amount,
                    token,
                    installments,
                    identificationNumber,
                    identificationType,
                } = cardForm.getCardFormData();

                fetch("{{ route('cliente.process_payment') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": "rDHvDHVwObnmduFHmytQKHLnpJOwi3yQhGAZyaGz"
                    },
                    body: JSON.stringify({
                        token,
                        issuer_id,
                        payment_method_id,
                        transaction_amount: Number(amount),
                        installments: Number(installments),
                        description: "Descripción del producto",
                        payer: {
                            email,
                            identification: {
                                type: identificationType,
                                number: identificationNumber,
                            },
                        },
                    }),
                });
            },
            onFetching: (resource) => {
                console.log("Fetching resource: ", resource);

                // Animate progress bar
                const progressBar = document.querySelector(".progress-bar");
                progressBar.removeAttribute("value");

                return () => {
                    progressBar.setAttribute("value", "0");
                };
            },
        },
    });
    // console.log(token);
</script>
