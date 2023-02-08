<table class="table">
    <thead>
        <tr>
        <th scope="col">Nombre d'utilisateurs</th>
        <th scope="col">Nombre d'échanges effectués</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>
            <?php if(isset($nbmembres)) { ?> 
                <?php echo $nbmembres['membres'] ?>
            <?php }
            ?>
        </td>
        <td>
            <?php if(isset($nbechanges)) { ?> 
                <?php echo $nbechanges['exchanges'] ?>
            <?php }
            ?>
        </td>
        </tr>
    </tbody>    
</table>