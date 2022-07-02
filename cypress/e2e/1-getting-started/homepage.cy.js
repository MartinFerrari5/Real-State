
/// <reference types="cypress"/> 
/*Para el autocompletado*/
describe("HOMEPAGE",()=>{
    it("Prueba index",()=>{
        cy.visit('index')
        /*document.querySelector()===cy.get()*/

                /*FALTA UN ASSERTION--->> ES UNA FUNCION QUE VERIFICA SI ALGO SE 
        CUMPLA O NO*/

        /*CORCHETE ES SELECTOR DE ATRIBUTOS*/
        cy.get('[data-cy="heading-sitio"]').should("exist"); //Debe existir tal elemento
        cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal','Ventas de Casas y Departamentos  Exclusivos de Lujo'); //INVOCA TODO EL TEXTO
        /*FALTA UN ASSERTION--->> ES UNA FUNCION QUE VERIFICA SI ALGO SE 
        CUMPLA O NO*/    
    })
 
    it("Prueba nosotros",()=>{
    // NO ES NECESARIO EL VISIT SI ESTOY EN LA MISMA PAGINA QUE ANTES
    cy.get('[data-cy="nosotros"]').should('exist');
    cy.get('[data-cy="nosotros"]').invoke('text').should('equal', 'Más sobre nosotros');
    cy.get('[data-cy="nosotros"]').should('have.prop','tagName').should('equal', 'P');
    
    cy.get('[data-cy="iconos-nosotros"]').should('exist');
    cy.get('[data-cy="iconos-nosotros"]').find('.assets-img').should('have.length',3); /*FIND BUSCA DENTRO DE LA ETIQUETA
    QUE POSEE EL ATRIBUTO data-cy="iconos-nosotros", una etiqueta con la clase
    assets-img*/
})

    it("Prueba cant. propiedades ",()=>{
        cy.get('[data-cy="anuncio"]').should('exist');
    cy.get('[data-cy="anuncio"]').find('.contenido-anuncio').should('have.length',3);
    })

    

    it("Prueba otros aspectos propiedades ",()=>{
        // BOTONES
        cy.get('[data-cy="enlace-prop"]').should('have.class',"link-propiedad");
        cy.get('[data-cy="enlace-prop"]').should("have.prop","tagName").should('equal',"A")
        cy.get('[data-cy="enlace-prop"]').first().invoke('text').should('equal',"VER PROPIEDAD")
        // Probando enlaces
        cy.get('[data-cy="enlace-prop"]').first().click();
        // SE UTILIZO UN visit() AUTOMATICO POR ENDE YA ESTA EVALUANDO EN OTRA PAGINA
        cy.get('[data-cy="section-title"]').should('exist')
        cy.wait(1000) //ESPERA 1 SEGUNDO (1000ms) ANTES DE SEGUIR LEYENDO EL CODIGO 
            cy.go('back')
       
    })
    it("Prueba Boton  Ver todas",()=>{
      cy.get("[data-cy='todas-prop']").should('exist').should("have.class","link-propiedad")
      cy.get("[data-cy='todas-prop']").invoke("attr","href").should('equal','anuncios')
        })
    it("Prueba Blog",()=>{
        // NO ES NECESARIO EL VISIT SI ESTOY EN LA MISMA PAGINA QUE ANTES
        cy.get('img[src="/public/build/img/blog1.jpg"]').should('exist');
        cy.get('img[src="/public/build/img/blog2.jpg"]').should('exist');
        // Link de contacto
        cy.get('[data-cy="button-contacto"]').should("exist")
        cy.get('[data-cy="button-contacto"]').invoke("attr","href")
        .should("equal","contacto")
        cy.get('[data-cy="button-contacto"]').click()
        cy.wait(1000) //ESPERA 1 SEGUNDO (1000ms) ANTES DE SEGUIR LEYENDO EL CODIGO 
        cy.go('back')
    })
  

})                                   