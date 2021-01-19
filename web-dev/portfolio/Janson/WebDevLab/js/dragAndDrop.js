function dragStart(ev) {
    ev.dataTransfer.effectAllowed = 'move';
    ev.dataTransfer.setData("Text", ev.target.getAttribute('id'));
    ev.dataTransfer.setDragImage(ev.target, 0, 0);
    return true;
}

function dragEnter(ev) {
    event.preventDefault();
    document.getElementById('togglee').style.display = "block";
    return true;
}

function dragOver(ev) {
    return false;
}

function dragDrop(ev) {
    var src = ev.dataTransfer.getData("Text");
    ev.target.appendChild(document.getElementById(src));
    ev.stopPropagation();

    document.getElementById('togglee').style.display = "block";
    document.getElementById('box').style.display = "none";
    return false;
}


