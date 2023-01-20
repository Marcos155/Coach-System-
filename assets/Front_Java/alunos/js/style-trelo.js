if (typeof dragAndDrop === 'undefined') {
	var dragAndDrop = (function() {
    
    var nodeToMove = null;
    var fakeNode = null;
    
    var asDraggable = {
      onDragStart: function(event) {
        console.log('dragstart',event);
        event.stopPropagation();
        // enregistrer le noeud à bouger
        nodeToMove = event.currentTarget;
        // activer les dépôts
        var nodeName = event.currentTarget.nodeName.toLowerCase();
        var nodeList = document.querySelectorAll(nodeName);
        for (var i=0, iMax=nodeList.length; i<iMax; i++) {
          if (nodeList.item(i) !== event.currentTarget) {
            nodeList.item(i).setAttribute('dropzone', 'move');
            nodeList.item(i).addEventListener('dragover', asDropZone.onDragOver);
          }
        }
        // créer le fake node
        fakeNode = document.createElement('article');
        fakeNode.setAttribute('data-fakenode', 'true');
        fakeNode.style.height = nodeToMove.offsetHeight + "px";
        fakeNode.style.width = nodeToMove.offsetWidth + "px";
        // remplacer le noeud à bouger par le fakenode
        nodeToMove.parentNode.replaceChild(fakeNode, nodeToMove);
        // activer les effets
        event.dataTransfer.effectAllowed = "move";
        event.dataTransfer.setData("text/html", event.currentTarget);
      },
      onDrag: function(event) {
        event.stopPropagation();
        console.log('drag',event);
      },
      onDragEnd: function(event) {
        event.stopPropagation();
        console.log('dragend',event);
        // remplacer le fakenode par le noeud à bouger
        fakeNode.parentNode.replaceChild(nodeToMove, fakeNode);
        // désactiver les dépôts
        var nodeName = event.currentTarget.nodeName.toLowerCase();
        var nodeList = document.querySelectorAll(nodeName);
        for (var i=0, iMax=nodeList.length; i<iMax; i++) {
          nodeList.item(i).removeAttribute('dropzone');
          nodeList.item(i).removeEventListener('dragover', asDropZone.onDragOver);
        }
        // libérer l'espace de nom
        nodeToMove = null;
        fakeNode = null;
      }
    };
    
    var asDropZone = {
      onDragEnter: function(event) {
        console.log('dragenter',event);
      },
      onDragOver: function(event) {
        //event.currentTarget.offsetHeight / 2
        console.log('dragover',event, event.currentTarget.nodeName);
        
      },
      onDragLeave: function(event) {
        console.log('dragleave',event);
      },
      onDrop: function(event) {
        console.log('drop',event);
      }
    }
    
  	// Membres publics
		return {
      add : function(node) {
        node.addEventListener('dragstart', asDraggable.onDragStart);
        node.addEventListener('dragend', asDraggable.onDragEnd);
        node.setAttribute('draggable', 'true');
      },
      remove : function(node) {
        node.removeEventListener('dragstart', asDraggable.onDragStart);
        node.removeEventListener('dragend', asDraggable.onDragEnd);
        node.removeAttribute('draggable', 'true');
      }
    };
	})(); // run the anonymous function
} else {
	console.error('"dragAndDrop" namespace already exists !');
}

var DragAndDrop = function(node) {
  console.info('new DragAndDrop(',node,') => ', this);
  
  this.node = node;
  this.img = null;
  
  this.node.dragAndDropObject = this;
  this.node.setAttribute('draggable', 'true');
  //this.node.setAttribute('dropzone', 'move');
  this.node.addEventListener('dragstart', this.asDraggable.onDragStart);
  /*
  this.node.addEventListener('dragend', this.asDraggable.onDragEnd);
  this.node.addEventListener('dragover', this.asDropZone.onDragOver);
  */
};

var nodeList, i, iMax;
nodeList = document.querySelectorAll('section');
for (i=0, iMax=nodeList.length; i<iMax; i++) {
  dragAndDrop.add(nodeList.item(i));
}
nodeList = document.querySelectorAll('article');
for (i=0, iMax=nodeList.length; i<iMax; i++) {
  dragAndDrop.add(nodeList.item(i));
}