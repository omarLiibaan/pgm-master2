
    @foreach($membres_cours as $membres_cour)


        <div>
            <h4>Football club versoix</h4>
            <h4>Centre Sportif Bécassière</h4>
            <h4>Route de l'Etraz 201</h4>
            <h4>CH-1290 Versoix</h4>
            <div style="margin-left: 59%">

                {{--<h3>{{$membres_cour->cou_nom}}</h3>--}}
                <h4>{{$membres_cour->mem_nom}} {{$membres_cour->mem_prenom}}</h4>
                <h4>{{$membres_cour->mem_adresse}} </h4>
                <h4>{{$membres_cour->mem_npa}} {{$membres_cour->mem_localite}} </h4>
                <br>
                <h4>Versoix, le {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', now())->format('d F Y') }}</h4>

                <hr>
            </div>
            <h4><span>Facture N°00001</span></h4>
            <br><br>
            <table>
                <tr>
                    <th>Désignation</th>
                    <th>Date début</th>
                    <th>Date de fin</th>
                    <th>Prix</th>
                </tr>
                <tr>
                    <td>{{$membres_cour->cou_nom}}</td>
                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($membres_cour->cou_datedebut))->format('d.m.Y') }}</td>
                    <td>{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($membres_cour->cou_datefin))->format('d.m.Y') }}</td>
                    <td>{{$membres_cour->cot_somme}} CHF</td>
                </tr>
            </table>
            <br>
            <h4>Montant à verser sur notre compte bancaire ci-dessous avant le {{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', date($membres_cour->cot_echeance))->format('d F Y') }} :</h4>
            <h4>    •	Nom : Liibaan OMAR</h4>
            <h4>    •	Adresse : Rte des Fayards 274, 1290 Versoix</h4>
            <h4>    •	IBAN CH34 0900 0000 1484 8209 0</h4>
            <h4>Nous vous remercions de la confiance que vous nous témoignez et nous réjouissons de notre future collaboration.</h4>
            <br>
            <div style="margin-left: 59%">
                <h4>Football club versoix</h4>
                <h4>Directeur sportif</h4>
                <h4>Vincent dufour</h4>
                <hr>
            </div>
        </div>
    @endforeach

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>



